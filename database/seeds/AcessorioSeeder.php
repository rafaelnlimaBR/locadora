<?php

use Illuminate\Database\Seeder;

class AcessorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('acessorios')->insert([
           'nome'       =>      'Bebe Conforto - De 0 kg a 13 kg',
            'valor'     =>      15.00,
            'descricao' =>      'Cadeirinha para bebes de 1 a 12 meses ou até 13 kg',
            'qnt'       =>      12
        ]);
        DB::table('acessorios')->insert([
            'nome'       =>      'Bebe Conforto - De 13 kg a 20 kg',
            'valor'     =>      15.00,
            'descricao' =>      'Cadeirinha para bebes de 12 a 24 meses ou até 20 kg',
            'qnt'       =>      12
        ]);
        DB::table('acessorios')->insert([
            'nome'       =>      'GPS - 7 polegadas.',
            'valor'     =>      15.00,
            'descricao' =>      'GPS de tela de 7 polegadas ideal para uma boa localização',
            'qnt'       =>      12
        ]);
    }
}
