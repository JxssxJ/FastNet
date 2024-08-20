<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;
use App\Charts\GraficoQtdPessoa;
use PDF;

class PessoaController extends Controller
{

    private $pagination = 2;

    public function index()
    {
        //app/http/Controller
        $dados = Pessoa::paginate($this->pagination);

        // dd($dados);

        return view("pessoa.list", ["dados" => $dados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view("pessoa.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //app/http/Controller

        $request->validate([
            'nome' => "required|max:60",
            'cpf' => "required|max:11",
            'renda' => "nullable",
            'imagem' => "nullable|image|mimes:png,jpeg,jpg",
        ], [
            'nome.required' => "O :attribute é obrigatório",
            'nome.max' => "Só é permitido 60 caracteres",
            'cpf.required' => "O :attribute é obrigatório",
            'cpf.max' => "Só é permitido 11 caracteres",
            'imagem.image' => "Deve ser enviado uma imagem",
            'imagem.mimes' => "A imagem deve ser da extensão de PNG, JPEG ou JPG",
        ]);

        $data = $request->all();
        $imagem = $request->file('imagem');
        if ($imagem) {
            $nome_arquivo =
                date('YmdHis') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/pessoa/";

            $imagem->storeAs($diretorio, $nome_arquivo, 'public');

            $data['imagem'] = $diretorio . $nome_arquivo;
        }

        pessoa::create($data);

        return redirect('pessoa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dado = pessoa::findOrFail($id);

        return view("pessoa.create", [
            'dado' => $dado,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //app/http/Controller

        $request->validate([
            'nome' => "required|max:60",
            'cpf' => "required|max:11",
            'renda' => "nullable",
            'imagem' => "nullable|image|mimes:png,jpeg,jpg",
        ], [
            'nome.required' => "O :attribute é obrigatório",
            'nome.max' => "Só é permitido 60 caracteres",
            'cpf.required' => "O :attribute é obrigatório",
            'cpf.max' => "Só é permitido 11 caracteres",
            'imagem.image' => "Deve ser enviado uma imagem",
            'imagem.mimes' => "A imagem deve ser da extensão de PNG, JPEG ou JPG",
        ]);

        $data = $request->all();
        $imagem = $request->file('imagem');
        //dd($imagem);

        if ($imagem) {
            $nome_arquivo =
                date('YmdHis') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/pessoa/";

            $imagem->storeAs($diretorio, $nome_arquivo, 'public');

            $data['imagem'] = $diretorio . $nome_arquivo;
        }

        pessoa::updateOrCreate(
            ['id' => $request->id],
            $data
        );

        return redirect('pessoa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dado = pessoa::findOrFail($id);
        // dd($dado);
        $dado->delete();

        return redirect('pessoa');
    }

    public function search(Request $request)
    {
        if (!empty($request->nome)) {
            $dados = pessoa::where(
                "nome",
                "like",
                "%" . $request->nome . "%"
            )->paginate($this->pagination);
        } else {
            $dados = pessoa::paginate($this->pagination);
        }
        // dd($dados);

        return view("pessoa.list", ["dados" => $dados]);
    }

    public function chart(GraficoQtdPessoa $pessoaChart)
    {
        return view("pessoa.chart", ["pessoaChart" => $pessoaChart->build()]);
    }

    public function report()
    {
        $pessoas = pessoa::All();

        $data = [
            'titulo' => 'Relatório de Clientes Cadastrados',
            'pessoas' => $pessoas,
        ];

        $pdf = PDF::loadView('pessoa.report', $data);

        return $pdf->stream();
    }
}
