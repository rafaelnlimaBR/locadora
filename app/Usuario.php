<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Usuario extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usuarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['pri_nome','seg_nome', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];



    public static $restricao = [
        'primeiro_nome' =>  'required',
        'segundo_nome'  =>  'required'
    ];
    public static $mensagem = [
        'required'    => 'O :attribute é obrigado.',

    ];

    public function grupo(){
        return $this->belongsTo('App\Grupo');
    }

    public static function cadastrar(Request $req)
    {

        $usuario            =   new Usuario();
        $usuario->pri_nome  =   $req->get('primeiro_nome');
        $usuario->seg_nome  =   $req->get('segundo_nome');
        $usuario->cep       =   $req->get('cep');
        $usuario->endereco  =   $req->get('endereco');
        $usuario->numero    =   $req->get('numero');
        $usuario->bairro    =   $req->get('bairro');
        $usuario->cidade    =   $req->get('cidade');
        $usuario->email     =   $req->get('email');
        $usuario->cep       =   $req->get('cep');
        $usuario->situacao  =   $req->get('situacao');
        $usuario->password  =   bcrypt('123');

        $usuario->grupo()->associate(Grupo::find($req->get('grupo')));

        if(!$usuario->save()){
            return new \Exception('Não foi possível cadastrar o usuário',200);
        }
    }

    public static function atualizar(Request $req)
    {
        $usuario = Usuario::find($req->get('id'));

        $usuario->pri_nome  =   $req->get('primeiro_nome');
        $usuario->seg_nome  =   $req->get('segundo_nome');
        $usuario->cep       =   $req->get('cep');
        $usuario->endereco  =   $req->get('endereco');
        $usuario->numero    =   $req->get('numero');
        $usuario->bairro    =   $req->get('bairro');
        $usuario->cidade    =   $req->get('cidade');
        $usuario->uf        =   $req->get('uf');
        $usuario->email     =   $req->get('email');
        $usuario->situacao  =   $req->get('situacao');

        $usuario->grupo()->associate(Grupo::find($req->get('grupo')));

        if(!$usuario->save()){
            return new \Exception('Não foi possível editar o usuário',200);
        }
    }

    public static function excluir(Request $req)
    {
        $usuario = Usuario::find($req->get('id'));

        if(!$usuario->delete()){
            return new \Exception('Não foi possível excluir o usuário',200);
        }
    }
}
