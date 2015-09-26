<?php

use Illuminate\Database\Seeder;

class OficinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oficinas')->insert([
            'nome'      =>  'Oficina Teste',
            'cidade'    =>  'Fortaleza',
            'estado'    =>  'CE',
            'endereco'  =>  'Av. Prof. Gomes de Matos',
            'numero'    =>  '0000',
            'cep'       =>  '60420431',
            'bairro'       =>  'Montese',
            'telefone'  =>  '3222222222',
            'celular'   =>  '8666666666',
            'email'     =>  'rafaelnlima@live.com',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
    }
}
