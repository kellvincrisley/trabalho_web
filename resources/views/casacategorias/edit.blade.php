@extends('layouts.default')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <h5 class="text-center">ALTERAR - CADASTRO - CASA CATEGORIA</h5>
        </div>
    </div>

    <form action="{{ route('casacategorias.update', $casaCategoria->id) }}" method="POST">

        @csrf
        <!-- {{ csrf_field() }} -->
        @method('PUT')


        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" value="{{ $casaCategoria->descricao }}" placeholder="Informe a descrição"
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
