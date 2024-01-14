@extends('app.layouts.basico')
@section('titulo', 'Pedidos')
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Clientes - Listar</p>
        </div>

        <div class="menu">
            <ul>
                <li> <a href="{{ route('pedido.create') }}">Novo</a></li>
                <li> <a href="{{ route('pedido.index') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina"> 
            <div style="width:90%; margin-left: auto; margin-right: auto;"> 
                    <table border="1" width="100%">
                        <thead>
                            <tr>
                                <th>ID Pedido:</th>
                                <th>Cliente:</th>
                                <th></th>
                                {{-- <th></th>
                                <th></th>
                                <th></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pedidos as $pedido)
                                <tr>
                                    <td>{{$pedido->id}}</td>
                                    <td>{{$pedido->cliente_id}}</td>
                                    <td><a href="{{ route('pedido-produto.create', $pedido->id) }}">Adicionar Produtos</a></td>
                                    <td><a href="{{ route('pedido.show', $pedido->id) }}">Visualizar</a></td> 
                                    <td><a href="{{route('pedido.edit', $pedido->id)}}">Editar</a></td> 
                                    <td>
                                        <form id='form_{{$pedido->id}}' action="{{ route('pedido.destroy', $pedido->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a></td>                                     
                                        </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $pedidos->appends($request)->links()}}        
                    <span> Exibindo {{ $pedidos->count() }} Pedidos de {{ $pedidos->total() }}</span>.
                    <br>
                    <span>({{ $pedidos->firstItem()}} a {{ $pedidos->lastItem()}})</span> .
            </div>
        </div>
    </div>

@endsection