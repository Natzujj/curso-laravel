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
    <!-- 
        $variavel testada não estiver definida (isset)
        ou
        $variavel testada possuir valor null
    -->
@endisset
