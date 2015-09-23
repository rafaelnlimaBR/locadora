<?php

use Illuminate\Database\Seeder;

class MarcaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marcas')->insert([
            'nome'      =>  'Fiat',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('marcas')->insert([
            'nome'      =>  'Volkswagem',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('marcas')->insert([
            'nome'      =>  'GM',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('marcas')->insert([
            'nome'      =>  'Renault',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('marcas')->insert([
            'nome'      =>  'Peugeot',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('marcas')->insert([
            'nome'      =>  'Toyota',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('marcas')->insert([
            'nome'      =>  'Mitsubishi',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('marcas')->insert([
            'nome'      =>  'Audi',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('marcas')->insert([
            'nome'      =>  'BMW',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ])
        ;
        DB::table('marcas')->insert([
            'nome'      =>  'Citroen',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('marcas')->insert([
            'nome'      =>  'Ford',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('marcas')->insert([
            'nome'      =>  'Hyundai',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('marcas')->insert([
            'nome'      =>  'Kia',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('marcas')->insert([
            'nome'      =>  'Honda',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('marcas')->insert([
            'nome'      =>  'Nissan',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
        DB::table('marcas')->insert([
            'nome'      =>  'Troller',
            'created_at'  =>  new DateTime(),
            'updated_at'  =>  new DateTime(),
        ]);
    }
}
