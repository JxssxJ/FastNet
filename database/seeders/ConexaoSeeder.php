<?php

namespace Database\Seeders;

use App\Models\Conexao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConexaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Conexao::create([
    'descricao' => "Fibra Óptica",
]
         )->create([
            'descricao' => "Rádio",
]
         )->create(   [
            'descricao' => "Satélite",
         ]);
     }
}
