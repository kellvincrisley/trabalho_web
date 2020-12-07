@extends('layouts.default')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <h5 class="text-center">CADASTRO LOCAÇÕES</h5>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" style="margin-bottom: 10px !important">
            <a class="btn btn-primary" href="{{ route('locacoes.create') }}" style="float:right"> Adicionar</a>
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
                        <th scope="col">CASA ID</th>
                        <th scope="col">CASA CATEGORIA</th>
                        <th scope="col">CASA DESCRIÇÃO</th>
                        <th scope="col">CASA DONO NOME</th>
                        <th scope="col">IMOBILIARIA ID</th>
                        <th scope="col">IMOBILIARIA</th>
                        <th scope="col">LOCADOR</th>
                        <th scope="col">OPÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($locacoes as $lo)
                        <tr>
                            <td>{{ $lo->casa->id }}</td>
                            <td>{{ $lo->casa->categoria->descricao }}</td>
                            <td>{{ $lo->casa->descricao }}</td>
                            <td>{{ $lo->casa->dono_nome }}</td>
                            <td>{{ $lo->casa->imobiliaria->id }}</td>
                            <td>{{ $lo->casa->imobiliaria->nome_fantasia }}</td>
                            <td>{{ $lo->locador->nome }}</td>
                            <td>
                                <a href="{{ route('locacoes.edit', $lo->id ) }}" class="btn btn-primary">ALTERAR</a>
                                <form action="{{ route('locacoes.destroy', $lo->id ) }}" method="POST" style="display:contents">
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
