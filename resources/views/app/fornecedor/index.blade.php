<h3>Fornecedor</h3>

@php
    // if (empty($variavel)) {} // retorna true se a variavel estiver vazia
@endphp

@isset($fornecedores)
    @forelse($fornecedores as $fornecedor)
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
