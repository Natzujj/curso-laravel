@extends('app.layouts.basico')
@section('titulo', 'Produto')
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produto - Adicionar</p>
        </div>

        <div class="menu">
            <ul>
                <li> <a href="{{ route('produto.index') }}">Voltar</a></li>
                <li> <a>Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            {{-- {{ $msg  ?? ''}} --}}
            <div style="width:30%; margin-left: auto; margin-right: auto;"> 
                <form action="" method="POST">
                    {{-- <input type="hidden" name="id" value="{{ $fornecedor->id ?? ''}}"> --}}
                    @csrf
                    <input type="text" name="nome" class="borda-preta" placeholder="Nome" value="">
                    {{-- <span style="color: red"> {{$errors->has('nome') ? $errors->first('nome') : ''}} </span> --}}
                    <input type="text" name="descricao" class="borda-preta" placeholder="Descrição" value="">
                    {{-- <span style="color: red"> {{$errors->has('site') ? $errors->first('site') : ''}} </span> --}}
                    <input type="text" name="peso" class="borda-preta" placeholder="Peso" value="">
                    {{-- <span style="color: red"> {{$errors->has('uf') ? $errors->first('uf') : ''}} </span> --}}
                    <select name="unidade_id">
                        <option value="" disabled selected> --Selecione a Unidade de Medida -- </option>
                        @foreach ($unidades as $unidade)
                            <option value="{{$unidade->id}}"> {{$unidade->descricao}} </option>                            
                        @endforeach
                    </select>
                    {{-- <span style="color: red"> {{$errors->has('email') ? $errors->first('email') : ''}} </span> --}}
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

@endsection