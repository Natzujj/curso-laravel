

@if(isset($produto->id))
<form action="{{ route('produto.update', ['produto' => $produto->id]) }}" method="POST">
    @csrf
    @method('PUT')
@else
<form action="{{ route('produto.store') }}" method="POST">
    @csrf
@endif
<select name="fornecedor_id">
    <option value="" disabled selected> --Selecione um Fornecedor -- </option>
    @foreach ($fornecedores as $fornecedor)
        <option value="{{$fornecedor->id}}" {{ ($produto->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : '' }}> {{$fornecedor->nome}} </option>                            
    @endforeach
</select>
<span style="color: red"> {{$errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : ''}} </span>
<input type="text" name="nome" class="borda-preta" placeholder="Nome" value="{{ $produto->nome ?? old('nome') }}">
    <span style="color: red"> {{$errors->has('nome') ? $errors->first('nome') : ''}} </span>
    <input type="text" name="descricao" class="borda-preta" placeholder="Descrição" value="{{ $produto->descricao ?? old('descricao') }}">
    <span style="color: red"> {{$errors->has('descricao') ? $errors->first('descricao') : ''}} </span>
    <input type="text" name="peso" class="borda-preta" placeholder="Peso" value="{{ $produto->peso ?? old('peso') }}">
    <span style="color: red"> {{$errors->has('peso') ? $errors->first('peso') : ''}} </span>
    <select name="unidade_id">
        <option value="" disabled selected> --Selecione a Unidade de Medida -- </option>
        @foreach ($unidades as $unidade)
            <option value="{{$unidade->id}}" {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}> {{$unidade->descricao}} </option>                            
        @endforeach
    </select>
    <span style="color: red"> {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}} </span>
    <button type="submit" class="borda-preta">Cadastrar</button>
</form>