<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plano_Internet;
use App\Models\Conexao;
use PDF;

class PlanoController extends Controller
{
    public function index()
    {
        //app/http/Controller
        $dado = Plano_Internet::all();

        //dd($dado);

        return view("planos.plano_list", ["dado" => $dado]);
    }

    /**
     * Show the plano_list for creating a new resource.
     */
    public function create()
    {
        $conexoes = Conexao::all();

        return view("planos.create", ['conexoes' => $conexoes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mega' => "required|max:4",
            'valor' => "required|max:16",
            'conexao_id' => "required"
            
        ], [
            'mega.required' => "O :attribute é obrigatório",
            'mega.max' => "Só é permitido 4 caracteres",
            'valor.required' => "O :attribute é obrigatório",
            'valor.max' => "Só é permitido 16 caracteres",
            'conexao_id.required' => "O :attibute é obrigatório!",
            

        ]);

        $data = $request->all();
 
        /*
        $plano = new Plano_Internet;

        $plano->mega = $request->mega;
        $plano->conexao_id = $request->conexao_id;
        $plano->valor = $request->valor;
        $plano->locacao = $request->locacao;

        $plano->save();
      */
      Plano_Internet::create($data);
        

        return redirect('plano');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the plano_list for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dado = Plano_Internet::findOrFail($id);

        $conexoes = Conexao::all();

        return view("planos.create", [
            'dado' => $dado,
            'conexoes' => $conexoes
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //app/http/Controller

        $request->validate([
            'mega' => "required|max:4",
            'valor' => "required|max:16",
            'conexao_id' => "required",
        ], [
            'mega.required' => "O :attribute é obrigatório",
            'mega.max' => "Só é permitido 4 caracteres",
            'valor.required' => "O :attribute é obrigatório",
            'valor.max' => "Só é permitido 16 caracteres",
            'conexao_id.required' => "O :attribute é obrigatório",

        ]);

        $data = $request->all();
        
        Plano_Internet::updateOrCreate(
            ['id' => $request->id],
            $data
        );

        return redirect('plano');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dado = Plano_Internet::findOrFail($id);
        // dd($dado);
        $dado->delete();

        return redirect('plano');
    }

    public function search(Request $request)
    {
        if (!empty($request->mega)) {
            $dados = Plano_Internet::where(
                "mega",
                "like",
                "%" . $request->mega . "%"
            )->get();
        } else {
            $dados = Plano_Internet::all();
        }
        // dd($dados);

        return view("planos.plano_list", ["dado" => $dados]);
    }

    public function report()
    {
        $planos = Plano_Internet::All();

        $data = [
            'titulo' => 'Relatório de Planos de Internet',
            'planos'=> $planos,
        ];

        $pdf = PDF::loadView('planos.report', $data);

        return $pdf->stream();
    }
}
