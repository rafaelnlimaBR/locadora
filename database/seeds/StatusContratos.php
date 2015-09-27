<?php

use Illuminate\Database\Seeder;

class StatusContratos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_contratos')->insert([
            'nome'      =>  'Locado',
            'cor' =>  '#00a65a',
            'descricao' =>  'Contrato em locação.',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('status_contratos')->insert([
            'nome'      =>  'Cancelado',
            'cor' =>  '#DC143C',
            'descricao' =>  'Contrato cancelado.',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('status_contratos')->insert([
            'nome'      =>  'Concluido',
            'cor' =>  '#0000C2',
            'descricao' =>  'Contrato concluido.',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('status_contratos')->insert([
            'nome'      =>  'Pre-Reservado',
            'cor' =>  '#D2691E',
            'descricao' =>  'Contrato pre reservado.',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('status_contratos')->insert([
            'nome'      =>  'Reservado',
            'cor' =>  '#FFA500',
            'descricao' =>  'Contrato reservado.',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
    }
}
