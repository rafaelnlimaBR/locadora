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
            $this->call(StatusClientesSeeder::class);
            $this->call(ConfiguracaoSeeder::class);
            $this->call(ModeloSeeder::class);
            $this->call(PatioSeeder::class);
            $this->call(OficinaSeeder::class);
            $this->call(ClienteSeeder::class);
            $this->call(AcessorioSeeder::class);
            $this->call(StatusContratos::class);


        Model::reguard();
    }
}
