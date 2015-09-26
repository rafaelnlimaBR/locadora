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
            'breve'             =>  'Locar',
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
            'veiculo_reparo'    =>  4,
            'veiculo_locado'    =>  2,
            'veiculo_prereservado'      =>  5,
            'veiculo_reservado' =>  3,
            'veiculo_disponivel'=>  1,
            'veiculo_indisponivel'  =>  6,
            'reparo_novo'       =>  1,
            'reparo_cancelado'  =>  2,
            'reparo_concluido'  =>  3,
            'novo_cliente'      =>  1,
            'pre_cliente'       =>  4,
            'inadimplente_cliente'      =>  3,
            'indisponivel_cliente'  =>  2,





            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
    }
}
