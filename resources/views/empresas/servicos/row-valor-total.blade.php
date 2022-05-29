@if(isset($edit) && $edit)
    <div class="text-center m-auto">
        @include('form.input', ["value" => isset($valor_total) ? $valor_total : '0,00', "size" => "col-12 col-lg-5 col-md-5 col-sm-12","id" => "valor_total", "label" => "Valor Total:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "R$ 0,00"]])
    </div>        
@endif
<h6 class="alert alert-success text-center mt-2">Valor total do Orçamento: R$ {{ $valor_total }}</h6>
