<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Departamento;
use Illuminate\Support\Facades\DB;

class GraficoQtdPessoa
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {

        /*

        SELECT COUNT(1) AS 'qtd_Pessoa_curso',
            cursos.nome FROM departamentos
            INNER JOIN cursos ON cursos.id = departamentos.curso_id
            GROUP BY curso_id
        */
        $departamentos = DB::table("departamentos")
                    ->selectRaw('count(1) as qtd_Pessoa_curso,cursos.nome as nome_curso')
                    ->join('cursos','cursos.id', '=','departamentos.curso_id')
                    ->groupBy('curso_id')->get();

        $qtdPessoas = [];
        $nomeCursos = [];

        foreach($departamentos as $item){
            $qtdPessoas[]= $item->qtd_Pessoa_curso;
            $nomeCursos[]= $item->nome_curso;
        }
       // dd($qtdPessoas);

        return $this->chart->pieChart()
            ->setTitle('Qtd Pessoas por Curso')
            ->setSubtitle('Semestre 2024.1')
            ->addData($qtdPessoas)
            ->setLabels($nomeCursos);
    }
}
