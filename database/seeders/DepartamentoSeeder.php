<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Departamento::create([
    'descricao' => "Wireless",
]
         )->create([
            'descricao' => "RJ45",
]
         )->create(   [
            'descricao' => "Switch de Mesa",
         ]);
     }
}
