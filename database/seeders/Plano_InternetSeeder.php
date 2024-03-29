<?php

namespace Database\Seeders;

use App\Models\Plano_Internet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Plano_InternetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plano_Internet::create([
           'mega' => "100",
           'valor' => "80",
           'locacao' => "0",
           'conexao_id' => "1",]
        )->create([
                'mega' => "200",
               'valor' => "100",
               'locacao' => "0",
               'conexao_id' => "2",]
        )->create(   ['mega' => "400",
        'valor' => "150",
        'locacao' => "1",
        'conexao_id' => "3",
        ]);
    }
}
