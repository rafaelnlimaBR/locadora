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
            'usuarios'  =>  '0',
            'grupos'    =>  '0',
            'adm'     =>  1,
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
    }
}
