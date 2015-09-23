<?php

use Illuminate\Database\Seeder;

class ClasseSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            'nome'              =>  'Grupo A - Econômico',
            'passageiros'       =>  4,
            'malas'             =>  2,
            'ar'                =>  0,
            'dh'                =>  0,
            'airbag'            =>  0,
            'valor'             =>  59.90,
            'situacao'          =>  1,
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('classes')->insert([
            'nome'              =>  'Grupo B - Econômico Com Ar',
            'passageiros'       =>  4,
            'malas'             =>  2,
            'ar'                =>  1,
            'dh'                =>  0,
            'airbag'            =>  0,
            'valor'             =>  79.90,
            'situacao'          =>  1,
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('classes')->insert([
            'nome'              =>  'Grupo L - Luxo',
            'passageiros'       =>  4,
            'malas'             =>  3,
            'ar'                =>  1,
            'dh'                =>  1,
            'airbag'            =>  1,
            'valor'             =>  179.90,
            'situacao'          =>  1,
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('classes')->insert([
            'nome'              =>  'Grupo P - Pickup',
            'passageiros'       =>  4,
            'malas'             =>  5,
            'ar'                =>  1,
            'dh'                =>  1,
            'airbag'            =>  1,
            'valor'             =>  219.90,
            'situacao'          =>  1,
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
    }
}
