<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\planotv;


class PlanoTVController extends Controller
{
    public function index()
    {
        //app/http/Controller
        $dado = planotv::all();

        //dd($dado);

        return view("planostv.planotv_list", ["dado" => $dado]);
    }

    /**
     * Show the plano_list for creating a new resource.
     */
    public function create()
    {
        return view("planostv.createtv");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => "required|max:255",
            'valor' => "required",
            'qtd_telas' => "required|numeric"
            
        ], [
            'nome.required' => "O :attribute é obrigatório",
            'nome.max' => "Só é permitido 255 caracteres",
            'valor.required' => "O :attribute é obrigatório",
            'valor.numeric' => "O valor precisa ser numérico!",
            'qtd_telas.required' => "O :attribute é obrigatório",
            'qtd_telas.numeric' => "O valor precisa ser numérico!",
        ]);

        $data = $request->all();
 
        /*
        $plano = new planotv;

        $plano->nome = $request->nome;
        $plano->conexao_id = $request->conexao_id;
        $plano->valor = $request->valor;
        $plano->locacao = $request->locacao;

        $plano->save();
      */
      planotv::create($data);
        

        return redirect('planotv');
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
        $dado = planotv::findOrFail($id);


        return view("planostv.createtv", [
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
            'nome' => "required|max:255",
            'valor' => "required|numeric",
            'qtd_telas' => "required|numeric"
            
        ], [
            'nome.required' => "O :attribute é obrigatório",
            'nome.max' => "Só é permitido 255 caracteres",
            'valor.required' => "O :attribute é obrigatório",
            'valor.numeric' => "O valor precisa ser numérico!",
            'qtd_telas.required' => "O :attribute é obrigatório",
            'qtd_telas.numeric' => "O valor precisa ser numérico!",
        ]);

        $data = $request->all();
        
        planotv::updateOrCreate(
            ['id' => $request->id],
            $data
        );

        return redirect('planotv');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dado = planotv::findOrFail($id);
        // dd($dado);
        $dado->delete();

        return redirect('planotv');
    }

    public function search(Request $request)
    {
        if (!empty($request->nome)) {
            $dados = planotv::where(
                "nome",
                "like",
                "%" . $request->nome . "%"
            )->get();
        } else {
            $dados = planotv::all();
        }
        // dd($dados);

        return view("planostv.planotv_list", ["dado" => $dados]);
    }
}
