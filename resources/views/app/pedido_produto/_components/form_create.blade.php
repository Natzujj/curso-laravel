<form action="{{ route('pedido-produto.store', ['pedido' => $pedido]) }}" method="POST">
    @csrf
<select name="produto_id">
    <option value="" disabled selected> --Selecione um Produto -- </option>
    @foreach ($produtos as $produto)
        <option value="{{$produto->id}}" {{ old('produto_id') == $produto->id ? 'selected' : '' }}> {{$produto->nome}} </option>                            
    @endforeach
</select>
<span style="color: red"> {{$errors->has('produto_id') ? $errors->first('produto_id') : ''}} </span>
<button type="submit" class="borda-preta">Cadastrar</button>

</form>