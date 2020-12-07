<?php

namespace App\Http\Controllers;

use App\Models\CasaCategoria;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CasaCategoriaController extends Controller
{
    public function index()
    {
        //
        $casacategorias = CasaCategoria::all();
        return view('casacategorias.index', compact('casacategorias'));
    }

    public function create()
    {
        return view('casacategorias.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'descricao' =>
                'required',
                'max:255',
                'unique:casa_categorias'
            ],
            [
                'descricao.required' => 'Campo obrigatório',
                'descricao.max' => 'Limite de caracteres: 255',
                'descricao.unique' => 'Registro já existe'
            ],

        );

        $casacategoria = new CasaCategoria();
        $casacategoria->descricao = $request->descricao;
        $casacategoria->save();

        return redirect()->route('casacategorias.index')->with('msg_sucesso', 'Gravado com sucesso');
    }

    public function edit($id)
    {
        $casaCategoria = CasaCategoria::FindorFail($id);
        return view('casacategorias.edit', compact(['casaCategoria']));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'descricao' =>
                'required',
                'max:255',
                'unique:casa_categorias'
            ],
            [
                'descricao.required' => 'Campo obrigatório',
                'descricao.max' => 'Limite de caracteres: 255',
                'descricao.unique' => 'Registro já existe'
            ],

        );

        $casaCategoria = CasaCategoria::FindorFail($id);
        $casaCategoria->descricao = $request->descricao;
        $casaCategoria->save();

        return redirect()->route('casacategorias.index')->with('msg_sucesso', 'Alterado com sucesso');
    }

    public function destroy($id)
    {
        $casaCategoria = CasaCategoria::FindorFail($id);
        $casaCategoria->delete();

        return redirect()->route('casacategorias.index')->with('msg_sucesso', 'Removido com sucesso');
    }
}
