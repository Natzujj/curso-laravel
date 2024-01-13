@if(isset($cliente->id))
<form action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}" method="POST">
    @csrf
    @method('PUT')
@else
<form action="{{ route('cliente.store') }}" method="POST">
    @csrf
@endif

<input type="text" name="nome" class="borda-preta" placeholder="Nome" value="{{ $cliente->nome ?? old('nome') }}">
<span style="color: red"> {{$errors->has('nome') ? $errors->first('nome') : ''}} </span>
<button type="submit" class="borda-preta">Cadastrar</button>

</form>