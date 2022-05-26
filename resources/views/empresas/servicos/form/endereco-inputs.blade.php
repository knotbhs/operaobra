<div class="row form-group">
    @include('form.input', ["value" => "", "size" => "col-12 col-lg-4 col-md-4 col-sm-6","id" => "cep", "label" => "CEP:","class" => "col-form-label form-control", "acoes" => ["oninput" => "buscaCep(this)"], "attributes" => ["placeholder" => "Cep"]])
    <li id="end-copy" class="list-group-item d-none">
        <div class="end-rua text-success cursor-pointer"></div>
        <span class="end-json d-none"></span>
    </li>
    <ul class="list-group p-2 lista-endereco">            
    </ul>
</div>
<div class="row form-group">
    @include('form.input', ["value" => "", "size" => "col-12 col-lg-7 col-md-8 col-sm-12","id" => "endereco", "label" => "Endereço:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Rua, Av..."]])
    @include('form.input', ["value" => "", "size" => "col-5 col-lg-2 col-md-4 col-sm-5","id" => "num", "label" => "Num:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Número"]])
    @include('form.input', ["value" => "", "size" => "col-7 col-lg-3 col-md-8 col-sm-7","id" => "complemento", "label" => "Complemento:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Bloco, Casa etc.."]])
</div> 
<div class="row form-group">
    @include('form.input', ["value" => "", "size" => "col-6 col-lg-4 col-md-4 col-sm-12","id" => "bairro", "label" => "Bairro:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Bairro"]])
    @include('form.input', ["value" => "", "size" => "col-6 col-lg-4 col-md-4 col-sm-12","id" => "cidade", "label" => "Cidade:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Cidade"]])
    @include('form.input', ["value" => "", "size" => "col-12 col-lg-4 col-md-4 col-sm-12","id" => "estado", "label" => "Estado:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Estado"]])
</div>