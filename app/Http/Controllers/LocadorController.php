<?php

namespace App\Http\Controllers;

use App\Models\Locador;
use Illuminate\Http\Request;

class LocadorController extends Controller
{
    public function index()
    {
        //
        $locadores = Locador::all();
        return view('locadores.index', compact('locadores'));
    }

    public function create()
    {
        return view('locadores.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nome' =>
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
                'nome.required' => 'Campo obrigatório',
                'nome.max' => 'Limite de caracteres: 255',

                'doc.required' => 'Campo obrigatório',
                'doc.max' => 'Limite de caracteres: 18',

                'email.required' => 'Campo obrigatório',
                'email.max' => 'Limite de caracteres: 255',

                'endereco.required' => 'Campo obrigatório',
                'endereco.max' => 'Limite de caracteres: 255',
            ],

        );

        $locador = new Locador();
        $locador->nome = $request->nome;
        $locador->email = $request->email;
        $locador->doc = $request->doc;
        $locador->endereco = $request->endereco;
        $locador->save();

        return redirect()->route('locadores.index')->with('msg_sucesso', 'Gravado com sucesso');
    }

    public function edit($id)
    {
        $locador = Locador::FindorFail($id);
        return view('locadores.edit', compact(['locador']));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nome' =>
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
                'nome.required' => 'Campo obrigatório',
                'nome.max' => 'Limite de caracteres: 255',

                'doc.required' => 'Campo obrigatório',
                'doc.max' => 'Limite de caracteres: 18',

                'email.required' => 'Campo obrigatório',
                'email.max' => 'Limite de caracteres: 255',

                'endereco.required' => 'Campo obrigatório',
                'endereco.max' => 'Limite de caracteres: 255',
            ],

        );

        $locador = Locador::FindorFail($id);
        $locador->nome = $request->nome;
        $locador->email = $request->email;
        $locador->doc = $request->doc;
        $locador->endereco = $request->endereco;
        $locador->save();

        return redirect()->route('locadores.index')->with('msg_sucesso', 'Alterado com sucesso');
    }

    public function destroy($id)
    {
        $locador = Locador::FindorFail($id);
        $locador->delete();

        return redirect()->route('locadores.index')->with('msg_sucesso', 'Removido com sucesso');
    }
}
