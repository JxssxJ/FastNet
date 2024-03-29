<?php

namespace Database\Seeders;

use App\Models\planotv;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanoTVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        planotv::create(
            [
                'nome' => "Pacote Futebol 8 Canais",
                'valor' => "35",
                'qtd_telas' => "1",
            ]
        )->create(
            [
                'nome' => "Pacote Infantil + Documentários 25 canais",
                'valor' => "45",
                'qtd_telas' => "2",
            ]
        )->create([
            'nome' => "Pacote Filmes + Futebol + Infantil",
            'valor' => "75",
            'qtd_telas' => "4",
        ]);
    }
}
