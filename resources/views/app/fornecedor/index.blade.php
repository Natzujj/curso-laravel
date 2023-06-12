<h3>Fornecedor</h3>

@php
    // if (empty($variavel)) {} // retorna true se a variavel estiver vazia
@endphp

@isset($fornecedores)
    @forelse($fornecedores as $fornecedor)
        {{-- Váriavel loop disponivel apenas em foreachs e forelses --}}
        {{-- @dd($loop) --}}
        Iteração atual: {{$loop->iteration}} 
        <br>
        @if($loop->first)
        Primeiro!
        @endif
        @if($loop->last)
        Ultimo! Total de registros = {{$loop->count}}
        @endif
        <br>
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? 'Não definido'}}
        <br>
        Telefone: ({{ $fornecedor['ddd'] ?? ''}}) {{ $fornecedor['telefone'] ?? ''}}
        <hr>
        @empty
        Não existem fornecedores cadastrados!
    @endforelse
@endisset
<br>
