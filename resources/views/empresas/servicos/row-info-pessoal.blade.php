
<h6 class="mt-2 px-2 text-primary">Informações pessoais:</h6>

<div class="px-3">
    <h5 class="card-title px-2 mt-3">
        {{ $cliente->name }}
    </h5>
    <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-primary">
        {{ $orcamento->etapa }}
    </span>
    <span class="card-text px-2">{{ $cliente->endereco }}</span> 
    <span class="card-text px-2">{{ $cliente->telefone }}</span> 
</div> 
<h6 class="mt-2 px-2 text-primary">Endereço da Obra:</h6>    
<div class="px-3"> 
    <p class="card-text px-2">{{ $orcamento->endereco_obra }}</p>   
</div>
