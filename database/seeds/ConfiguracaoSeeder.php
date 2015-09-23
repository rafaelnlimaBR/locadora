<?php

use Illuminate\Database\Seeder;

class ConfiguracaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configuracoes')->insert([
            'empresa'           =>  'Locadora de Carros.',
            'endereco'          =>  'Av. Gomes de Matos',
            'breve'             =>  'LoCar',
            'numero'            =>  '1900',
            'bairro'            =>  'Montese',
            'cidade'            =>  'Fortaleza',
            'estado'            =>  'CE',
            'cep'               =>  '60420431',
            'cnpj'              =>  '00000000000000',
            'telefone1'         =>  '(85)3333333333',
            'telefone2'         =>  '(85)3333333322',
            'celular1'          =>  '(85)986607785',
            'celular2'          =>  '(85)988888888',
            'veiculo_novo'      =>  1,
            'veiculo_reparo'    =>  1,
            'veiculo_locado'    =>  1,
            'veiculo_prereservado'      =>  1,
            'veiculo_reservado' =>  1,



            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
    }
}
