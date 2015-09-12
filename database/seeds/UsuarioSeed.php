<?php

use Illuminate\Database\Seeder;

class UsuarioSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idAdm = \App\Grupo::admin()->id;

        DB::table('usuarios')->insert([
            'pri_nome'  =>  'Admin',
            'seg_nome'  =>  'Admin',
            'grupo_id'  =>  $idAdm,
            'email'     =>  'rafaelnlima@live.com',
            'situacao'      =>  1,
            'foto'      =>  'default.png',
            'password'  =>  bcrypt('123'),
            'created_at'=>  new Datetime(),
            'updated_at'=>  new Datetime()
        ]);
    }
}
