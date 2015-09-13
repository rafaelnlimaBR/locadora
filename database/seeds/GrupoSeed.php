<?php

use Illuminate\Database\Seeder;

class GrupoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grupos')->insert([
            'nome'      =>  'Administrador',
            'situacao'  =>  1,
            'usuario'   =>  'a:5:{s:3:"vis";s:1:"1";s:3:"edi";s:1:"1";s:3:"cad";s:1:"1";s:3:"exc";s:1:"1";s:3:"det";s:1:"1";}',
            'grupo'     =>  'a:5:{s:3:"vis";s:1:"1";s:3:"edi";s:1:"1";s:3:"cad";s:1:"1";s:3:"exc";s:1:"1";s:3:"det";s:1:"1";}',
            'adm'     =>  1,
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);

    }
}
