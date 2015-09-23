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
            'backgroud' =>  '#00a65a',
            'descricao' =>  'Reparo em andamento.',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('status_reparos')->insert([
            'nome'      =>  'Cancelado',
            'backgroud' =>  'FFFF00',
            'descricao' =>  'Reparo cancelado.',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('status_reparos')->insert([
            'nome'      =>  'Concluido',
            'backgroud' =>  '#0000C2',
            'descricao' =>  'Reparo finalizados.',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
    }
}
