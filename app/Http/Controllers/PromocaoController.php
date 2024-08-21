<?php

namespace App\Http\Controllers;

use App\Models\Promocao;
use Illuminate\Http\Request;
use PDF;

class PromocaoController extends Controller
{

    private $pagination = 3;

    public function index()
    {
        //app/http/Controller
        $dados = Promocao::paginate($this->pagination);

        // dd($dados);

        return view("promocoes.list", ["dados" => $dados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view("promocoes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //app/http/Controller

        $request->validate([
            'descricao' => "required|max:60",
            'valor' => "required|max:6",
            'quantidade' => "required",
            'imagem' => "nullable|image|mimes:png,jpeg,jpg",
        ], [
            'descricao.required' => "O :attribute é obrigatório",
            'descricao.max' => "Só é permitido 60 caracteres",
            'valor.required' => "O :attribute é obrigatório",
            'valor.max' => "Só é permitido 6 caracteres",
            'imagem.image' => "Deve ser enviado uma imagem",
            'imagem.mimes' => "A imagem deve ser da extensão de PNG, JPEG ou JPG",
        ]);

        $data = $request->all();
        $imagem = $request->file('imagem');
        if ($imagem) {
            $descricao_arquivo =
                date('YmdHis') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/promocao/";

            $imagem->storeAs($diretorio, $descricao_arquivo, 'public');

            $data['imagem'] = $diretorio . $descricao_arquivo;
        }

        Promocao::create($data);

        return redirect('promocao');
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
        $dado = Promocao::findOrFail($id);

        return view("promocoes.create", [
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
            'descricao' => "required|max:60",
            'valor' => "required|max:6",
            'quantidade' => "required",
            'imagem' => "nullable|image|mimes:png,jpeg,jpg",
        ], [
            'descricao.required' => "O :attribute é obrigatório",
            'descricao.max' => "Só é permitido 60 caracteres",
            'valor.required' => "O :attribute é obrigatório",
            'valor.max' => "Só é permitido 6 caracteres",
            'quantidade.required' => "O :attribute é obrigatório",
            'imagem.image' => "Deve ser enviado uma imagem",
            'imagem.mimes' => "A imagem deve ser da extensão de PNG, JPEG ou JPG",
        ]);

        $data = $request->all();
        $imagem = $request->file('imagem');
        //dd($imagem);

        if ($imagem) {
            $descricao_arquivo =
                date('YmdHis') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/promocao/";

            $imagem->storeAs($diretorio, $descricao_arquivo, 'public');

            $data['imagem'] = $diretorio . $descricao_arquivo;
        }

        Promocao::updateOrCreate(
            ['id' => $request->id],
            $data
        );

        return redirect('promocao');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dado = Promocao::findOrFail($id);
        // dd($dado);
        $image_path = public_path('storage/'.$dado->imagem);

        if(file_exists($image_path)){
            unlink($image_path);
        }
        $dado->delete();

        return redirect('promocao');
    }

    public function search(Request $request)
    {
        if (!empty($request->descricao)) {
            $dados = Promocao::where(
                "descricao",
                "like",
                "%" . $request->descricao . "%"
            )->paginate($this->pagination);
        } else {
            $dados = Promocao::paginate($this->pagination);
        }
        // dd($dados);

        return view("promocoes.list", ["dados" => $dados]);
    }

    public function chart(GraficoQtdPessoa $pessoaChart)
    {
        return view("promocoes.chart", ["pessoaChart" => $pessoaChart->build()]);
    }

    public function report()
    {
        $promocoes = Promocao::All();

        $data = [
            'titulo' => 'Relatório de Promoções Ativas',
            'promocoes' => $promocoes,
        ];

        $pdf = PDF::loadView('promocoes.report', $data);

        return $pdf->stream();
    }
}
