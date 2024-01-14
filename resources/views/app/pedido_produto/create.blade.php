@extends('app.layouts.basico')
@section('titulo', 'Pedido Produto')
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Pedido Produto - Adicionar</p>
        </div>

        <div class="menu">
            <ul>
                <li> <a href="{{ route('pedido.index') }}">Voltar</a></li>
                <li> <a href="{{ route('pedido.index') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            {{-- {{ $msg  ?? ''}} --}}
            <h4>Detalhes do pedido</h4>
            <p>ID do Pedido: {{ $pedido->id }}</p>
            <p>ID do Cliente: {{ $pedido->id }}</p>
            <div style="width:30%; margin-left: auto; margin-right: auto;"> 
                <h4>Itens do Pedido</h4>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome do Produto</th>
                            <th>Data de inclusão do item no pedido</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->produtos as $produto)     
                            <tr>
                                <td>{{ $produto->id }}</td>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->pivot->created_at->format('d/m/Y H:i:s') }}</td>
                                <td>
                                    <form id="form_{{$pedido->id}}_{{$produto->id}}" 
                                       method="POST" action="{{route('pedido-produto.destroy', ['pedido' => $pedido->id, 'produto' => $produto->id ])}}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$pedido->id}}_{{$produto->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])                 
                @endcomponent
            </div>
        </div>
    </div>

@endsection