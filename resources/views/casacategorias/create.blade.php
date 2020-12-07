@extends('layouts.default')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <h5 class="text-center">ADICIONAR - CADASTRO - CASA CATEGORIA</h5>
        </div>
    </div>

    <form action="{{ route('casacategorias.store') }}" method="POST">

        @csrf
        <!-- {{ csrf_field() }} -->

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Informe a descrição"
                autofocus="">
            @error('descricao')
                <div class="alert alert-danger my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Gravar</button>
        <a href="{{ route('casacategorias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
