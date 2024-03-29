<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produto::create([
           'nome' => "Roteador 500mbps",
           'departamento_id' => "1",
           'valor' => "389",
           'qtd' => "10",]
        )->create([
                'nome' => "Cabo de Rede 5m",
                'departamento_id' => "2",
               'valor' => "50",
               'qtd' => "70",]
        )->create(   [
        'nome' => "Switch 32 portas",
        'departamento_id' => "3",
        'valor' => "2199",
        'qtd' => "8",
        ]);
    }
}
