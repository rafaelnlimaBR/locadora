<?php

use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'nome'  =>  'Cliente Teste',
            'tipo_registro' =>  'CPF',
            'registro'      =>  '0000000000',
            'cep'           =>  '60420431',
            'logradouro'    =>  'Av. Gomes de Matos',
            'numero'        =>  '1900',
            'cidade'        =>  'Fortaleza',
            'estado'        =>  'CE',
            'email'         =>  'teste@live.com',
            'telefone1'     =>  '000000000000',
            'status_id'     =>  1,
            'pesquisa'      =>  'Cliente Teste 000000000000',
            'created_at'=>  new Datetime(),
            'updated_at'=>  new Datetime()
        ]);
    }
}
