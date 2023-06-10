<h3>Fornecedor</h3>

{{-- @dd($fornecedores) --}}

@if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
    @foreach ($fornecedores as $fornecedor)
        <p>{{$fornecedor}}</p>
    @endforeach

@elseif(count($fornecedores) > 10)
    <h3>Existem vários fornecedores cadastrados</h3>
    @foreach ($fornecedores as $fornecedor)
        {{$fornecedor}}, 
    @endforeach
@else
    <h3>Não existem fornecedores cadastrados</h3>
@endif