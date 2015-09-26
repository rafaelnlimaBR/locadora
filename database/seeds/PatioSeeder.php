<?php

use Illuminate\Database\Seeder;

class PatioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patios')->insert([
            'nome'      =>  'Aeroporto Pinto Martins',
            'cidade'    =>  'Fortaleza',
            'estado'    =>  'CE',
            'logradouro'=>  'Av. Prof. Gomes de Matos',
            'numero'    =>  '0000',
            'cep'       =>  '60420431',
            'aeroporto' =>  0,
            'situacao'  =>  1,
            'pesquisa'  =>  'Aeroporto Pinto Martins Fortaleza CE ',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('patios')->insert([
            'nome'      =>  'Patio Beira Mar',
            'cidade'    =>  'Fortaleza',
            'estado'    =>  'CE',
            'logradouro'=>  'Av. Beira Mar',
            'numero'    =>  '0000',
            'cep'       =>  '60420431',
            'aeroporto' =>  0,
            'situacao'  =>  1,
            'pesquisa'  =>  'Patio Beira Mar Fortaleza CE ',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
    }
}
