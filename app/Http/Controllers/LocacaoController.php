<?php

namespace App\Http\Controllers;

use App\Models\Locador;
use App\Models\Casa;
use App\Models\Locacao;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LocacaoController extends Controller
{
    public function index()
    {
        $locacoes = Locacao::all();
        return view('locacoes.index', compact('locacoes'));
    }

    public function create()
    {
        $casas = Casa::all();
        $locadores = Locador::all();
        return view('locacoes.create', compact(['casas', 'locadores']));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'casa_id' =>
                'required',
                Rule::exists('locacoes')                     
                ->where(function ($query) use ($request) {                      
                    $query->where('casa_id', $request->casa_id);
                    $query->where('locador_id', $request->locador_id);                 
                }),

                'locador_id' =>
                'required',

            ],
            [
                'casa_id.required' => 'Campo Obrigatório',
                'casa_id.exists' => 'Relação já cadastrada',
                'locador_id.required' => 'Campo Obrigatório',
            ]

        );

        $locacao = new Locacao();
        $locacao->casa_id = $request->casa_id;
        $locacao->locador_id = $request->locador_id;
        $locacao->save();

        return redirect()->route('locacoes.index')->with('msg_sucesso', 'Gravado com sucesso');
    }

    public function edit($id)
    {
        $locacao = Locacao::FindorFail($id);
        $casas = Casa::all();
        $locadores = Locador::all();
        return view('locacoes.edit', compact(['locacao', 'casas', 'locadores']));
    }

    public function update(Request $request, $id)
    {
        $locacao = Locacao::FindorFail($id);
        $request->validate(
            [
                'casa_id' =>
                'required',
                Rule::exists('locacoes')                     
                ->where(function ($query) use ($request, $locacao) {                      
                    $query->where('casa_id', $request->casa_id);
                    $query->where('locador_id', $request->locador_id);                 
                }),

                'locador_id' =>
                'required',

            ],
            [
                'casa_id.required' => 'Campo Obrigatório',
                'casa_id.exists' => 'Relação já cadastrada',
                'locador_id.required' => 'Campo Obrigatório',
            ]

        );

        
        $locacao->casa_id = $request->casa_id;
        $locacao->locador_id = $request->locador_id;
        $locacao->save();

        return redirect()->route('locacoes.index')->with('msg_sucesso', 'Alterado com sucesso');
    }

    public function destroy($id)
    {
        $locacao = Locacao::FindorFail($id);
        $locacao->delete();

        return redirect()->route('locacoes.index')->with('msg_sucesso', 'Removido com sucesso');
    }
}
