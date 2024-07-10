<?php

namespace Database\Seeders;

use App\Models\Cadastrador;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class CadastradorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cadastradors')->insert([
            ['nome' => 'Andressa', 'ativo' => Cadastrador::ATIVO],
            ['nome' => 'Rosen', 'ativo' => Cadastrador::ATIVO],
            ['nome' => 'Rosimeire', 'ativo' => Cadastrador::ATIVO],
            ['nome' => 'Sarah', 'ativo' => Cadastrador::ATIVO],
            ['nome' => 'Samara', 'ativo' => Cadastrador::ATIVO],
            ['nome' => 'Deborah Marzabal', 'ativo' => Cadastrador::ATIVO],
            ['nome' => 'Deborah Letícia', 'ativo' => Cadastrador::ATIVO],
            ['nome' => 'Rosana', 'ativo' => Cadastrador::ATIVO],
            ['nome' => 'Wilma', 'ativo' => Cadastrador::ATIVO],
            ['nome' => 'Luciana', 'ativo' => Cadastrador::ATIVO],
            ['nome' => 'Marcelo', 'ativo' => Cadastrador::ATIVO],
            ['nome' => 'Marcela', 'ativo' => Cadastrador::ATIVO],
            ['nome' => 'Marilda', 'ativo' => Cadastrador::ATIVO],
            ['nome' => 'Naudy', 'ativo' => Cadastrador::ATIVO],
            ['nome' => 'Heraldo', 'ativo' => Cadastrador::ATIVO],
            ['nome' => 'Anderson - Andy', 'ativo' => Cadastrador::ATIVO],
        ]);
    }
}









