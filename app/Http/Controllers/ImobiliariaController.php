<?php

namespace App\Http\Controllers;

use App\Models\Imobiliaria;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ImobiliariaController extends Controller
{
    public function index()
    {
        //
        $imobiliarias = Imobiliaria::all();
        return view('imobiliarias.index', compact('imobiliarias'));
    }

    public function create()
    {
        return view('imobiliarias.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nome_fantasia' =>
                'required',
                'max:255',

                'razao_social' =>
                'required',
                'max:255',

                'doc' =>
                'required',
                'max:18',

                'email' =>
                'required',
                'max:255',

                'endereco' =>
                'required',
                'max:255',

            ],
            [
                'nome_fantasia.required' => 'Campo obrigatório',
                'nome_fantasia.max' => 'Limite de caracteres: 255',

                'razao_social.required' => 'Campo obrigatório',
                'razao_social.max' => 'Limite de caracteres: 255',

                'doc.required' => 'Campo obrigatório',
                'doc.max' => 'Limite de caracteres: 18',

                'email.required' => 'Campo obrigatório',
                'email.max' => 'Limite de caracteres: 255',

                'endereco.required' => 'Campo obrigatório',
                'endereco.max' => 'Limite de caracteres: 255',
            ],

        );

        $imobiliaria = new Imobiliaria();
        $imobiliaria->nome_fantasia = $request->nome_fantasia;
        $imobiliaria->razao_social = $request->razao_social;
        $imobiliaria->email = $request->email;
        $imobiliaria->doc = $request->doc;
        $imobiliaria->endereco = $request->endereco;
        $imobiliaria->save();

        return redirect()->route('imobiliarias.index')->with('msg_sucesso', 'Gravado com sucesso');
    }

    public function edit($id)
    {
        $imobiliaria = Imobiliaria::FindorFail($id);
        return view('imobiliarias.edit', compact(['imobiliaria']));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nome_fantasia' =>
                'required',
                'max:255',

                'razao_social' =>
                'required',
                'max:255',

                'doc' =>
                'required',
                'max:18',
                Rule::unique('email')->ignore($id),

                'email' =>
                'required',
                'max:255',
                Rule::unique('email')->ignore($id),

                'endereco' =>
                'required',
                'max:255',

            ],
            [
                'nome_fantasia.required' => 'Campo obrigatório',
                'nome_fantasia.max' => 'Limite de caracteres: 255',

                'razao_social.required' => 'Campo obrigatório',
                'razao_social.max' => 'Limite de caracteres: 255',

                'doc.required' => 'Campo obrigatório',
                'doc.max' => 'Limite de caracteres: 18',
                'doc.unique' => 'Registro já existe',

                'email.required' => 'Campo obrigatório',
                'email.max' => 'Limite de caracteres: 255',
                'email.unique' => 'Registro já existe',

                'endereco.required' => 'Campo obrigatório',
                'endereco.max' => 'Limite de caracteres: 255',
            ],

        );

        $imobiliaria = Imobiliaria::FindorFail($id);
        $imobiliaria->nome_fantasia = $request->nome_fantasia;
        $imobiliaria->razao_social = $request->razao_social;
        $imobiliaria->email = $request->email;
        $imobiliaria->doc = $request->doc;
        $imobiliaria->endereco = $request->endereco;
        $imobiliaria->save();

        return redirect()->route('imobiliarias.index')->with('msg_sucesso', 'Alterado com sucesso');
    }

    public function destroy($id)
    {
        $imobiliaria = Imobiliaria::FindorFail($id);
        $imobiliaria->delete();

        return redirect()->route('imobiliarias.index')->with('msg_sucesso', 'Removido com sucesso');
    }
}
