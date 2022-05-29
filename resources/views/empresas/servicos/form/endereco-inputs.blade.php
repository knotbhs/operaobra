@if (isset($obra) && $obra)    
    @php
        $cep = isset($orcamento->endereco_obra['cep']) ? $orcamento->endereco_obra['cep'] : null;
        $endereco = isset($orcamento->endereco_obra['rua']) ? $orcamento->endereco_obra['rua'] : null;
        $numero = isset($orcamento->endereco_obra['numero']) ? $orcamento->endereco_obra['numero'] : null;
        $complemento = isset($orcamento->endereco_obra['complemento']) ? $orcamento->endereco_obra['complemento'] : null;
        $bairro = isset($orcamento->endereco_obra['bairro']) ? $orcamento->endereco_obra['bairro'] : null;
        $cidade = isset($orcamento->endereco_obra['cidade']) ? $orcamento->endereco_obra['cidade'] : null;
        $estado = isset($orcamento->endereco_obra['estado']) ? $orcamento->endereco_obra['estado'] : null;

        $comple = "_obra";
    @endphp
@else
    @php
        $cep = isset($cliente->endereco['cep']) ? $cliente->endereco['cep'] : null;
        $endereco = isset($cliente->endereco['rua']) ? $cliente->endereco['rua'] : null;
        $numero = isset($cliente->endereco['numero']) ? $cliente->endereco['numero'] : null;
        $complemento = isset($cliente->endereco['complemento']) ? $cliente->endereco['complemento'] : null;
        $bairro = isset($cliente->endereco['bairro']) ? $cliente->endereco['bairro'] : null;
        $cidade = isset($cliente->endereco['cidade']) ? $cliente->endereco['cidade'] : null;
        $estado = isset($cliente->endereco['estado']) ? $cliente->endereco['estado'] : null;
        $comple = "";
    @endphp
@endif
<div class="row form-group">
    @include('form.input', ["value" => isset($cep) ? $cep : null, "size" => "col-12 col-lg-4 col-md-4 col-sm-6","id" => "cep".$comple, "label" => "CEP:","class" => "col-form-label form-control", "acoes" => ["oninput" => "buscaCep(this)"], "attributes" => ["placeholder" => "Cep"]])
    <li id="end-copy" class="list-group-item d-none">
        <div class="end-rua text-success cursor-pointer"></div>
        <span class="end-json d-none"></span>
    </li>
    <ul class="list-group p-2 lista-endereco">            
    </ul>
</div>
<div class="row form-group">
    @include('form.input', ["value" => isset($endereco) ? $endereco : null, "size" => "col-12 col-lg-7 col-md-8 col-sm-12","id" => "endereco".$comple, "label" => "Endereço:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Rua, Av..."]])
    @include('form.input', ["value" => isset($numero) ? $numero : null, "size" => "col-5 col-lg-2 col-md-4 col-sm-5","id" => "num".$comple, "label" => "Num:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Número"]])
    @include('form.input', ["value" => isset($complemento) ? $complemento : null, "size" => "col-7 col-lg-3 col-md-8 col-sm-7","id" => "complemento".$comple, "label" => "Complemento:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Bloco, Casa etc.."]])
</div> 
<div class="row form-group">
    @include('form.input', ["value" => isset($bairro) ? $bairro : null, "size" => "col-6 col-lg-4 col-md-4 col-sm-12","id" => "bairro".$comple, "label" => "Bairro:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Bairro"]])
    @include('form.input', ["value" => isset($cidade) ? $cidade : null, "size" => "col-6 col-lg-4 col-md-4 col-sm-12","id" => "cidade".$comple, "label" => "Cidade:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Cidade"]])
    @include('form.input', ["value" => isset($estado) ? $estado : null, "size" => "col-12 col-lg-4 col-md-4 col-sm-12","id" => "estado".$comple, "label" => "Estado:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Estado"]])
</div>