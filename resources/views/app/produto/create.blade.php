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
                <li> <a href="{{ route('produto.index') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            {{-- {{ $msg  ?? ''}} --}}
            <div style="width:30%; margin-left: auto; margin-right: auto;"> 
                <form action="{{ route('produto.store') }}" method="POST">
                    {{-- <input type="hidden" name="id" value="{{ $fornecedor->id ?? ''}}"> --}}
                    @csrf
                    <input type="text" name="nome" class="borda-preta" placeholder="Nome" value="{{ old('nome') }}">
                    <span style="color: red"> {{$errors->has('nome') ? $errors->first('nome') : ''}} </span>
                    <input type="text" name="descricao" class="borda-preta" placeholder="Descrição" value="{{ old('descricao') }}">
                    <span style="color: red"> {{$errors->has('descricao') ? $errors->first('descricao') : ''}} </span>
                    <input type="text" name="peso" class="borda-preta" placeholder="Peso" value="{{ old('peso') }}">
                    <span style="color: red"> {{$errors->has('peso') ? $errors->first('peso') : ''}} </span>
                    <select name="unidade_id">
                        <option value="" disabled selected> --Selecione a Unidade de Medida -- </option>
                        @foreach ($unidades as $unidade)
                            <option value="{{$unidade->id}}" {{ old('unidade_id') == $unidade->id ? 'selected' : '' }}> {{$unidade->descricao}} </option>                            
                        @endforeach
                    </select>
                    <span style="color: red"> {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}} </span>
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

@endsection