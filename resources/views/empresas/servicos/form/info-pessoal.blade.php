<div class="row form-group px-3">
    @include('form.input', ["value" => $cliente->name, "size" => "col-7","id" => "nome", "label" => "Nome do Cliente:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Nome"]])
    @include('form.input', ["value" => $cliente->cnpj, "size" => "col-5","id" => "cpfcnpj", "label" => "CPF/CNPJ:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "CPF/CNPJ"]])
    @include('form.input', ["value" => $cliente->telefone, "size" => "col-7","id" => "telefone", "label" => "Telefones:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Tel/Cel"]])
</div>