<?php

namespace App\Http\Controllers;

use App\Models\Imobiliaria;
use App\Models\CasaCategoria;
use App\Models\Casa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CasaController extends Controller
{
    public function index()
    {
        $casas = Casa::all();
        return view('casas.index', compact('casas'));
    }

    public function create()
    {
        $imobiliarias = Imobiliaria::all();
        $categorias = CasaCategoria::all();
        return view('casas.create', compact(['imobiliarias', 'categorias']));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'imobiliaria_id' =>
                'required',

                'casa_categoria_id' =>
                'required',

                'descricao' =>
                'required',
                'max:255',

                'endereco' =>
                'required',
                'max:255',

                'dono_nome' =>
                'required',
                'max:255',

                'dono_doc' =>
                'required',
                'max:16',


            ],
            [
                'imobiliaria_id.required' => 'Campo Obrigatório',
                'casa_categoria_id.required' => 'Campo Obrigatório',
                'descricao.required' => 'Campo obrigatório',
                'descricao.max' => 'Limite de caracteres: 255',
                'endereco.required' => 'Campo obrigatório',
                'endereco.max' => 'Limite de caracteres: 255',
                'dono_nome.required' => 'Campo obrigatório',
                'dono_nome.max' => 'Limite de caracteres: 255',
                'dono_doc.required' => 'Campo obrigatório',
                'dono_doc.max' => 'Limite de caracteres: 16'
            ]

        );

        $casa = new Casa();
        $casa->imobiliaria_id = $request->imobiliaria_id;
        $casa->casa_categoria_id = $request->casa_categoria_id;
        $casa->descricao = $request->descricao;
        $casa->endereco = $request->endereco;
        $casa->dono_nome = $request->dono_nome;
        $casa->dono_doc = $request->dono_doc;
        $casa->save();

        return redirect()->route('casas.index')->with('msg_sucesso', 'Gravado com sucesso');
    }

    public function edit($id)
    {
        $casa = Casa::FindorFail($id);
        $imobiliarias = Imobiliaria::all();
        $categorias = CasaCategoria::all();
        return view('casas.edit', compact(['casa', 'imobiliarias', 'categorias']));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'imobiliaria_id' =>
                'required',

                'casa_categoria_id' =>
                'required',

                'descricao' =>
                'required',
                'max:255',

                'endereco' =>
                'required',
                'max:255',

                'dono_nome' =>
                'required',
                'max:255',

                'dono_doc' =>
                'required',
                'max:16',


            ],
            [
                'imobiliaria_id.required' => 'Campo Obrigatório',
                'casa_categoria_id.required' => 'Campo Obrigatório',
                'descricao.required' => 'Campo obrigatório',
                'descricao.max' => 'Limite de caracteres: 255',
                'endereco.required' => 'Campo obrigatório',
                'endereco.max' => 'Limite de caracteres: 255',
                'dono_nome.required' => 'Campo obrigatório',
                'dono_nome.max' => 'Limite de caracteres: 255',
                'dono_doc.required' => 'Campo obrigatório',
                'dono_doc.max' => 'Limite de caracteres: 16'
            ]

        );

        $casa = Casa::FindorFail($id);
        $casa->imobiliaria_id = $request->imobiliaria_id;
        $casa->casa_categoria_id = $request->casa_categoria_id;
        $casa->descricao = $request->descricao;
        $casa->endereco = $request->endereco;
        $casa->dono_nome = $request->dono_nome;
        $casa->dono_doc = $request->dono_doc;
        $casa->save();

        return redirect()->route('casas.index')->with('msg_sucesso', 'Alterado com sucesso');
    }

    public function destroy($id)
    {
        $casa = Casa::FindorFail($id);
        $casa->delete();

        return redirect()->route('casas.index')->with('msg_sucesso', 'Removido com sucesso');
    }
}
