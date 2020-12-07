@extends('layouts.default')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <h5 class="text-center">ADICIONAR - CADASTRO - LOCAÇÃO</h5>
        </div>
    </div>

    <form action="{{ route('locacoes.update', $locacao->id) }}"
        method="POST">

        @csrf
        <!-- {{ csrf_field() }} -->
        @method('PUT')

        <div class="form-group">
            <label for="casa">Casa</label>
            <select id="casa" name="casa_id">
                <option value="">Selecione</option>
                @foreach ($casas as $c)
                    <option value="{{ $c->id }}" {{ $c->id == $locacao->casa_id ? 'selected=""' : '' }}>{{ $c->descricao }}</option>
                @endforeach
            </select>
            @error('casa_id')
                <div class="alert alert-danger my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="locador">Locador</label>
            <select id="locador" name="locador_id">
                <option value="">Selecione</option>
                @foreach ($locadores as $lo)
                    <option value="{{ $lo->id }}" {{ $lo->id == $locacao->locador_id ? 'selected=""' : '' }}>{{ $lo->nome }}</option>
                @endforeach
            </select>
            @error('locador_id')
                <div class="alert alert-danger my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Gravar</button>
        <a href="{{ route('locacoes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
