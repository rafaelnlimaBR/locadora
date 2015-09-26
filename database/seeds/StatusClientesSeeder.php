<?php

use Illuminate\Database\Seeder;

class StatusClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_clientes')->insert([
           'nome'   =>  'Disponível',
            'cor'   =>  '#00a65a',
            'descricao' =>  'Status de disponibilidade do cliente.'
        ]);
        DB::table('status_clientes')->insert([
            'nome'   =>  'Indisponível',
            'cor'   =>  '#000000',
            'descricao' =>  'Status de indisponibilidade do cliente.'
        ]);
        DB::table('status_clientes')->insert([
            'nome'   =>  'Inadimplente',
            'cor'   =>  '#DC143C',
            'descricao' =>  'Status de inadimplência do cliente.'
        ]);
        DB::table('status_clientes')->insert([
            'nome'   =>  'Pre-Cadastrado',
            'cor'   =>  '#FFA500',
            'descricao' =>  'Cliente previamente cadastrado..'
        ]);
    }
}
