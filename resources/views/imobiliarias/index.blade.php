@extends('layouts.default')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <h5 class="text-center">CADASTRO DE IMOBILIARIAS</h5>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" style="margin-bottom: 10px !important">
            <a class="btn btn-primary" href="{{ route('imobiliarias.create') }}" style="float:right"> Adicionar</a>
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
                        <th scope="col">NOME FANTASIA</th>
                        <th scope="col">RAZÃO SOCIAL</th>
                        <th scope="col">E-MAIL</th>
                        <th scope="col">CPF/CNPJ</th>
                        <th scope="col">ENDERECO</th>
                        <th scope="col">OPÇÕES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($imobiliarias as $i)
                        <tr>
                            <td>{{ $i->id }}</td>
                            <td>{{ $i->nome_fantasia }}</td>
                            <td>{{ $i->razao_social }}</td>
                            <td>{{ $i->email }}</td>
                            <td>{{ $i->doc }}</td>
                            <td>{{ $i->endereco }}</td>
                            <td>
                                <a href="{{ route('imobiliarias.edit', $i->id ) }}" class="btn btn-primary">ALTERAR</a>
                                <form action="{{ route('imobiliarias.destroy', $i->id ) }}" method="POST" style="display:contents">
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
