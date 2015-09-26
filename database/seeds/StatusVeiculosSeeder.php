<?php

use Illuminate\Database\Seeder;

class StatusVeiculosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_veiculos')->insert([
            'nome'      =>  'Disponível',
            'cor'       =>  '#00a65a',
            'descricao' =>  'Status para quando o veículo estiver disponível',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('status_veiculos')->insert([
            'nome'      =>  'Locado',
            'cor'       =>  '#FFFF00',
            'descricao' =>  'Status de quando o veículo estiver locados',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('status_veiculos')->insert([
            'nome'      =>  'Reservado',
            'cor'       =>  '#FF8C00',
            'descricao' =>  'Status para quando o veículo estiver reservado',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('status_veiculos')->insert([
            'nome'      =>  'Reparo',
            'cor'       =>  '#FF0000',
            'descricao' =>  'Status para quando o veículo estiver em manutenção',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('status_veiculos')->insert([
            'nome'      =>  'Pre-Reservado',
            'cor'       =>  '#20B2AA',
            'descricao' =>  'Status para quando o veículo estiver reservado via pagina do cliente',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('status_veiculos')->insert([
            'nome'      =>  'Indisponível',
            'cor'       =>  '#000000',
            'descricao' =>  'Status para quando o veículo estiver indisponivel',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
    }
}
