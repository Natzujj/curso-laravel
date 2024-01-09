@if(isset($produto_detalhe->id))
<form action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}" method="POST">
    @csrf
    @method('PUT')
@else
<form action="{{ route('produto-detalhe.store') }}" method="POST">
    @csrf
@endif
    <input type="text" name="produto_id" class="borda-preta" placeholder="ID do Produto" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}">
    <span style="color: red"> {{$errors->has('produto_id') ? $errors->first('produto_id') : ''}} </span>
    <input type="text" name="comprimento" class="borda-preta" placeholder="Comprimento do Produto" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}">
    <span style="color: red"> {{$errors->has('comprimento') ? $errors->first('comprimento') : ''}} </span>
    <input type="text" name="largura" class="borda-preta" placeholder="Largura do Produto" value="{{ $produto_detalhe->largura ?? old('largura') }}">
    <span style="color: red"> {{$errors->has('largura') ? $errors->first('largura') : ''}} </span>
    <input type="text" name="altura" class="borda-preta" placeholder="Altura do Produto" value="{{ $produto_detalhe->altura ?? old('altura') }}">
    <span style="color: red"> {{$errors->has('altura') ? $errors->first('altura') : ''}} </span>

    <select name="unidade_id">
        <option value="" disabled selected> --Selecione a Unidade de Medida -- </option>
        @foreach ($unidades as $unidade)
            <option value="{{$unidade->id}}" {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}> {{$unidade->descricao}} </option>                            
        @endforeach
    </select>
    
    <span style="color: red"> {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}} </span>
    <button type="submit" class="borda-preta">Cadastrar</button>
</form>