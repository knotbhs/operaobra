<form>
    <div class="mb-3">
        @include('form.textarea', ["value" => isset($service) ? $service : null, "size" => "col-12 col-lg-12 col-md-12 col-sm-12","id" => "servico", "label" => "Serviço:","class" => "col-form-label form-control", "attributes" => ['rows' => 4, 'cols' => 54, "placeholder" => ""]])
    </div>
    <div class="mb-3">
        @include('form.input', ["value" => isset($value) ? $value : null, "size" => "col-12 col-lg-12 col-md-12 col-sm-12","id" => "valor", "label" => "Valor R$:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "R$ 0,00"]])
    </div>
</form>