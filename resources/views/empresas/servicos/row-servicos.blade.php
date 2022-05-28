<h6 class="mt-2 px-2 text-primary">Serviços:</h6>
<div class="px-3">
    <div class="list-group list-group-flush p-3">
        @isset($orcamento['servicos'])
            @for ($i = 0; $i < count($orcamento['servicos']); $i++)      
            <div class="row">            
                <div class="{{ isset($edit) && $edit ? 'col-lg-10 col-md-8 col-sm-8 col-8' : 'col-12' }} list-group-item text-truncate">
                    <div class="row item">
                        <div class="col-lg-10 col-md-10 col-sm-9 col-9 text-truncate" special="name">{{ $orcamento["servicos"][$i]["name"] }}</div>                                            
                        <div class="col-lg-2 col-md-2 col-sm-3 col-3 text-truncate" special="valor">R$ {{ number_format($orcamento["servicos"][$i]["valor"],2,",",".") }}</div>
                        <div class="d-none" special="id">{{ $i }}</div>
                    </div>
                </div>  
                @if(isset($edit) && $edit) 
                    <div class="col-lg-2 col-md-4 col-sm-4 col-4 btn-group btn-group-sm" role="group" aria-label="Basic outlined example">
                        <button type="button" class="btn btn-outline-light text-primary" onclick="editarItem(this)">Editar <i class="fa-pen fa-solid"></i></button>
                    </div>
                @endif
            </div> 
            @endfor
        @endisset        
        <div class="row">
            <a href="#" class="{{ isset($edit) && $edit ? 'col-lg-10 col-md-8 col-sm-8 col-8' : 'col-12' }} list-group-item text-primary text-truncate">Novo Serviço</a>
        </div>
    </div> 
    <div class="px-2 text-dark">Valor Serviços: <strong>R$ {{ isset($valor_servicos) ? $valor_servicos : "0,00" }}</strong></div>
</div>