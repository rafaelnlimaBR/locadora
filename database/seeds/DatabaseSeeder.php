<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

            $this->call(GrupoSeed::class);
            $this->call(UsuarioSeed::class);
            $this->call(MarcaSeed::class);
            $this->call(ClasseSeed::class);
            $this->call(StatusVeiculosSeeder::class);
            $this->call(StatusReparosSeeder::class);
            $this->call(ConfiguracaoSeeder::class);


        Model::reguard();
    }
}
