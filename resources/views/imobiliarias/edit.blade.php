@extends('layouts.default')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <h5 class="text-center">ADICIONAR - CADASTRO - IMOBILIARIA</h5>
        </div>
    </div>

    <form action="{{ route('imobiliarias.update', $imobiliaria->id) }}" method="POST">

        @csrf
        <!-- {{ csrf_field() }} -->
        @method('PUT')

        <div class="form-group">
            <label for="nome_fantasia">Nome Fantasia</label>
            <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia" placeholder="Informe o Nome Fantasia"
                autofocus="" value="{{ $imobiliaria->nome_fantasia }}">
            @error('nome_fantasia')
                <div class="alert alert-danger my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="razao_social">Razão Social</label>
            <input type="text" class="form-control" id="razao_social" name="razao_social" placeholder="Informe a Razão Social"
            value="{{ $imobiliaria->razao_social }}">
            @error('razao_social')
                <div class="alert alert-danger my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Informe o Email"
            value="{{ $imobiliaria->email }}">
            @error('email')
                <div class="alert alert-danger my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="doc">(CPF/CNPJ)</label>
            <input type="text" class="form-control" id="doc" name="doc" placeholder="Informe o CPF/CNPJ"
            value="{{ $imobiliaria->doc }}">
            @error('doc')
                <div class="alert alert-danger my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Informe o Endereço"
            value="{{ $imobiliaria->endereco }}">
            @error('endereco')
                <div class="alert alert-danger my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Gravar</button>
        <a href="{{ route('imobiliarias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
