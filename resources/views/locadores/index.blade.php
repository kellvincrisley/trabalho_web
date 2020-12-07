@extends('layouts.default')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <h5 class="text-center">CADASTRO DE LOCADORES</h5>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" style="margin-bottom: 10px !important">
            <a class="btn btn-primary" href="{{ route('locadores.create') }}" style="float:right"> Adicionar</a>
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
                        <th scope="col">NOME</th>
                        <th scope="col">E-MAIL</th>
                        <th scope="col">CPF/CNPJ</th>
                        <th scope="col">ENDEREÇO</th>
                        <th scope="col">OPÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($locadores as $l)
                        <tr>
                            <td>{{ $l->id }}</td>
                            <td>{{ $l->nome }}</td>
                            <td>{{ $l->email }}</td>
                            <td>{{ $l->doc }}</td>
                            <td>{{ $l->endereco }}</td>
                            <td>
                                <a href="{{ route('locadores.edit', $l->id ) }}" class="btn btn-primary">ALTERAR</a>
                                <form action="{{ route('locadores.destroy', $l->id ) }}" method="POST" style="display:contents">
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
