<?php

use Illuminate\Database\Seeder;

class StatusReparosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_reparos')->insert([
            'nome'      =>  'Em andamento',
            'cor' =>  '#00a65a',
            'descricao' =>  'Reparo em andamento.',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('status_reparos')->insert([
            'nome'      =>  'Cancelado',
            'cor' =>  '#DC143C',
            'descricao' =>  'Reparo cancelado.',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('status_reparos')->insert([
            'nome'      =>  'Concluido',
            'cor' =>  '#0000C2',
            'descricao' =>  'Reparo finalizados.',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
    }
}
