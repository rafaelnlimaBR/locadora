<?php

use Illuminate\Database\Seeder;

class ModeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('modelos')->insert([
            'nome'      =>  'Palio ELX 1.4',
            'marca_id'  =>  \App\Marca::PesquisarPorNome('Fiat')->first()->id,
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('modelos')->insert([
            'nome'      =>  'Celta LT 1.0',
            'marca_id'  =>  \App\Marca::PesquisarPorNome('GM')->first()->id,
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('modelos')->insert([
            'nome'      =>  'Gol G5 Trend 1.0',
            'marca_id'  =>  \App\Marca::PesquisarPorNome('Volkswagem')->first()->id,
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
    }
}
