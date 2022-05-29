<h6 class="mt-2 px-2 text-primary mt-4">Endereços: </h6>
<div class="row form-group px-3">
    <div class="endereco1">
        @include('empresas.servicos.form.endereco-inputs', ["obra" => false])
    </div>     
    <div class="row form-group mt-4">
        @include('form.checkbox', ["value" => "", "size" => "col-12","id" => "mesmoendereco", "label" => "Endereço da obra diferente:","class" => "form-check-input", "attributes" => []])               
    </div>
    <div class="enderecoObra mt-2 border-primary border-top" style="display: none;">
        <h6 class="mt-2 px-2 text-primary mt-2">Endereço da Obra: </h6>
        <div class="px-4">            
            @include('empresas.servicos.form.endereco-inputs', ["obra" => true])
        </div>
        
    </div>   
</div>