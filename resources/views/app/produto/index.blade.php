@extends('app.layouts.basico')
@section('titulo', 'Produto')
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produto - Listar</p>
        </div>

        <div class="menu">
            <ul>
                <li> <a href="{{ route('produto.create')}}">Novo</a></li>
                <li> <a>Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina"> 
            <div style="width:90%; margin-left: auto; margin-right: auto;"> 
                    <table border="1" width="100%">
                        <thead>
                            <tr>
                                <th>Nome:</th>
                                <th>Descrição:</th>
                                <th>Peso:</th>
                                <th>Unidade:</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produtos as $produto)
                                <tr>
                                    <td>{{$produto->nome}}</td>
                                    <td>{{$produto->descricao}}</td>
                                    <td>{{$produto->peso}}</td>
                                    <td>{{$produto->unidade_id}}</td>
                                    <td><a>Editar</a></td> 
                                    <td><a>Excluir</a></td>                                     
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $produtos->appends($request)->links()}}        
                    <span> Exibindo {{ $produtos->count() }} Fornecedores de {{ $produtos->total() }}</span>.
                    <br>
                    <span>({{ $produtos->firstItem()}} a {{ $produtos->lastItem()}})</span> .
            </div>
        </div>
    </div>

@endsection