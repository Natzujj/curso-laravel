<h3>Fornecedor</h3>

{{-- @dd($fornecedores) --}}

Fornecedor: {{ $fornecedores[0]['nome'] }}
<br>
Status: {{ $fornecedores[0]['status'] }}
<br>
{{-- @if(!($fornecedores[0]['status'] == 'S'))
    <p>Fornecedor inativo!</p>
@endif --}}

@unless($fornecedores[0]['status'] == 'S')
    <p>Fornecedor inativo!</p>
@endunless