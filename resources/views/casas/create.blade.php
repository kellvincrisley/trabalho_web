@extends('layouts.default')

@section('body')

    <div class="row">
        <div class="col-md-12">
            <h5 class="text-center">ADICIONAR - CADASTRO - CASA</h5>
        </div>
    </div>

    <form action="{{ route('casas.store') }}" method="POST">

        @csrf
        <!-- {{ csrf_field() }} -->

        <div class="form-group">
            <label for="imobiliaria">Imobiliaria</label>
            <select id="imobiliaria" name="imobiliaria_id" autofocus="">
                <option value="">Selecione</option>
                @foreach ($imobiliarias as $i)
                    <option value="{{ $i->id }}">{{ $i->nome_fantasia }}</option>

                @endforeach
            </select>
            @error('imobiliaria_id')
                <div class="alert alert-danger my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select id="categoria" name="casa_categoria_id">
                <option value="">Selecione</option>
                @foreach ($categorias as $ca)
                    <option value="{{ $ca->id }}">{{ $ca->descricao }}</option>

                @endforeach
            </select>
            @error('casa_categoria_id')
                <div class="alert alert-danger my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Informe a descrição"
                >
            @error('descricao')
                <div class="alert alert-danger my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Informe o endereço"
                >
            @error('endereco')
                <div class="alert alert-danger my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="dono_nome">Nome do Dono</label>
            <input type="text" class="form-control" id="dono_nome" name="dono_nome" placeholder="Informe o nome do dono da casa"
                >
            @error('dono_nome')
                <div class="alert alert-danger my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="dono_doc">CPF/CNPJ do Dono</label>
            <input type="text" class="form-control" id="dono_doc" name="dono_doc" placeholder="Informe o cpf/cnpj do dono da casa"
                >
            @error('dono_doc')
                <div class="alert alert-danger my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Gravar</button>
        <a href="{{ route('casas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
