@extends('layouts.default')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <h5 class="text-center">ADICIONAR - CADASTRO - LOCADORES</h5>
        </div>
    </div>

    <form action="{{ route('locadores.store') }}" method="POST">

        @csrf
        <!-- {{ csrf_field() }} -->

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Informe o Nome"
                autofocus="">
            @error('nome')
                <div class="alert alert-danger my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Informe o Email"
                >
            @error('email')
                <div class="alert alert-danger my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="doc">(CPF/CNPJ)</label>
            <input type="text" class="form-control" id="doc" name="doc" placeholder="Informe o CPF/CNPJ"
                >
            @error('doc')
                <div class="alert alert-danger my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Informe o Endereço"
                >
            @error('endereco')
                <div class="alert alert-danger my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Gravar</button>
        <a href="{{ route('locadores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
