<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pessoa;
class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pessoa::create([
           'nome' => "Arnold Santos",
           'cpf' => "16582191047",
           'renda' => "42342",
           'imagem' => "imagem/pessoa/20240820194137.png",]
        )->create([
                'nome' => "Rethosku Aknabi",
               'cpf' => "94600916018",
               'renda' => "2974",
               'imagem' => "imagem/pessoa/20240820194137.png",]
        )->create(   ['nome' => "Kiyru Marote",
        'cpf' => "17932705037",
        'renda' => "9264",
        'imagem' => "imagem/pessoa/20240820194137.png",
        ]);
    }
}
