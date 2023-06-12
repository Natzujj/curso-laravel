<h3>Fornecedor</h3>

@php
    // if (empty($variavel)) {} // retorna true se a variavel estiver vazia
@endphp

@isset($fornecedores)
    Fornecedor: {{ $fornecedores[0]['nome'] }}
    <br>
    Status: {{ $fornecedores[0]['status'] }}
    <br>
    CNPJ: {{ $fornecedores[0]['cnpj'] ?? 'Não definido'}}
    <br>
    Telefone: ({{ $fornecedores[0]['ddd'] ?? ''}}) {{ $fornecedores[0]['telefone'] ?? ''}}
    @switch($fornecedores[2]['ddd'])
        @case('11')
            São Paulo - SP
            @break
        @case('61')
            Brasilia - DF
            @break
        @case('21')
            Rio de Janeiro - RJ
            @break
        @default
            Estado não identificado
    @endswitch
@endisset
