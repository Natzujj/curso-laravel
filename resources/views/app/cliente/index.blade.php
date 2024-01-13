@extends('app.layouts.basico')
@section('titulo', 'Cliente')
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Clientes - Listar</p>
        </div>

        <div class="menu">
            <ul>
                <li> <a href="{{ route('cliente.create') }}">Novo</a></li>
                <li> <a href="{{ route('cliente.index') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina"> 
            <div style="width:90%; margin-left: auto; margin-right: auto;"> 
                    <table border="1" width="100%">
                        <thead>
                            <tr>
                                <th>Nome:</th>
                                {{-- <th></th>
                                <th></th>
                                <th></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{$cliente->nome}}</td>
                                    <td><a href="{{ route('cliente.show', $cliente->id) }}">Visualizar</a></td> 
                                    <td><a href="{{route('cliente.edit', $cliente->id)}}">Editar</a></td> 
                                    <td>
                                        <form id='form_{{$cliente->id}}' action="{{ route('cliente.destroy', $cliente->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            {{-- <button type="submit">Excluir</button> --}}
                                            <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a></td>                                     
                                        </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $clientes->appends($request)->links()}}        
                    <span> Exibindo {{ $clientes->count() }} Clientes de {{ $clientes->total() }}</span>.
                    <br>
                    <span>({{ $clientes->firstItem()}} a {{ $clientes->lastItem()}})</span> .
            </div>
        </div>
    </div>

@endsection