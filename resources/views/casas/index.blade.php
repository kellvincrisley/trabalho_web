@extends('layouts.default')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <h5 class="text-center">CADASTRO DE CASAS</h5>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" style="margin-bottom: 10px !important">
            <a class="btn btn-primary" href="{{ route('casas.create') }}" style="float:right"> Adicionar</a>
        </div>

        @if (session('msg_sucesso'))
            <div class="col-md-12">
                <div class="alert alert-success">
                    {{ session('msg_sucesso') }}
                </div>
            </div>
        @endif

        @if (session('msg_erro'))
            <div class="col-md-12">
                <div class="alert alert-success">
                    {{ session('msg_erro') }}
                </div>
            </div>
        @endif

    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">IMOBILIARIA</th>
                        <th scope="col">CATEGORIA</th>
                        <th scope="col">DESCRIÇÃO</th>
                        <th scope="col">ENDEREÇO</th>
                        <th scope="col">DONO NOME</th>
                        <th scope="col">DONO (CPF/CNPJ)</th>
                        <th scope="col">OPÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($casas as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->imobiliaria->nome_fantasia }}</td>
                            <td>{{ $c->categoria->descricao }}</td>
                            <td>{{ $c->descricao }}</td>
                            <td>{{ $c->endereco }}</td>
                            <td>{{ $c->dono_nome }}</td>
                            <td>{{ $c->dono_doc }}</td>
                            <td>
                                <a href="{{ route('casas.edit', $c->id ) }}" class="btn btn-primary">ALTERAR</a>
                                <form action="{{ route('casas.destroy', $c->id ) }}" method="POST" style="display:contents">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">EXCLUIR</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
