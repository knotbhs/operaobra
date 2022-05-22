<h6 class="mt-2 px-2 text-primary mt-4">Endereços: </h6>
<div class="row form-group px-3">
    <div class="endereco1">
        <div class="row form-group">
            @include('form.input', ["value" => "", "size" => "col-4","id" => "cep", "label" => "CEP:","class" => "col-form-label form-control", "acoes" => ["oninput" => "buscaCep(this)"], "attributes" => ["placeholder" => "Cep"]])
            <li id="end-copy" class="list-group-item d-none"><div class="end-rua text-success cursor-pointer"></div><span class="end-json d-none"></span></li>
            <ul class="list-group p-2 lista-endereco">            
            </ul>
        </div>
        <div class="row form-group">
            @include('form.input', ["value" => "", "size" => "col-7","id" => "endereco", "label" => "Endereço:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Rua, Av..."]])
            @include('form.input', ["value" => "", "size" => "col-2","id" => "num", "label" => "Num:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Número"]])
            @include('form.input', ["value" => "", "size" => "col-3","id" => "complemento", "label" => "Complemento:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Bloco, Casa etc.."]])
        </div> 
        <div class="row form-group">
            @include('form.input', ["value" => "", "size" => "col-4","id" => "bairro", "label" => "Bairro:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Bairro"]])
            @include('form.input', ["value" => "", "size" => "col-4","id" => "cidade", "label" => "Cidade:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Cidade"]])
            @include('form.input', ["value" => "", "size" => "col-4","id" => "estado", "label" => "Estado:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Estado"]])
        </div>
    </div>     
    <div class="row form-group mt-4">
        @include('form.checkbox', ["value" => "", "size" => "col-12","id" => "mesmoendereco", "label" => "Endereço da obra diferente:","class" => "form-check-input", "attributes" => []])               
    </div>
    <div class="enderecoObra mt-2 border-primary border-top" style="display: none;">
        <h6 class="mt-2 px-2 text-primary mt-2">Endereço da Obra: </h6>
        <div class="px-4">
            <div class="row form-group mt-2">
                @include('form.input', ["value" => "", "size" => "col-4","id" => "cep", "label" => "CEP:","class" => "col-form-label form-control", "acoes" => ["oninput" => "buscaCep(this)"], "attributes" => ["placeholder" => "Cep"]])        
                <ul class="list-group p-2 lista-endereco">            
                </ul>
            </div>
            <div class="row form-group">
                @include('form.input', ["value" => "", "size" => "col-7","id" => "endereco", "label" => "Endereço:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Rua, Av..."]])
                @include('form.input', ["value" => "", "size" => "col-2","id" => "num", "label" => "Num:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Número"]])
                @include('form.input', ["value" => "", "size" => "col-3","id" => "complemento", "label" => "Complemento:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Bloco, Casa etc.."]])
            </div> 
            <div class="row form-group">
                @include('form.input', ["value" => "", "size" => "col-4","id" => "bairro", "label" => "Bairro:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Bairro"]])
                @include('form.input', ["value" => "", "size" => "col-4","id" => "cidade", "label" => "Cidade:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Cidade"]])
                @include('form.input', ["value" => "", "size" => "col-4","id" => "estado", "label" => "Estado:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Estado"]])
            </div>
        </div>
        
    </div>   
</div>

@section('content-js')
    <script>
        let timeout;
        let ajax;
        function EnderecoDaObra(request)
        {
            
            if($(request).is(":checked"))
            {
                $(".enderecoObra").show();
                $(".enderecoObra input[name='cep']").focus();
            }else{
                $(".enderecoObra").hide();
            }
        }
        function buscaCep(cep)
        {
            clearTimeout(timeout);
            timeout = setTimeout(function(){
                let cepSearch = cep.value.replace(/[^0-9]/g,'');
                if(cepSearch.length == 8)
                {
                    let divparent = $(cep).parent().parent().parent();
                    
                    ajax = $.ajax("https://viacep.com.br/ws/"+cepSearch+"/json/").done(function(result){
                        $(divparent).find(".lista-endereco").html("");
                        let clone = $("#end-copy").clone().appendTo($(divparent).find(".lista-endereco"));
                        $(clone).find("div.end-rua").html(result.logradouro+" - "+result.complemento);
                        $(clone).find("span.end-json").html(JSON.stringify(result));
                        $(clone).removeAttr("id");
                        $(clone).removeClass("d-none");
                        $(clone).attr("onclick", "cepSelecionado(this)");
                    });
                }
            }, 300);
        }
        function cepSelecionado(cep)
        {
            let endjson = JSON.parse($(cep).parent().find("span").html());
            let divparent = $(cep).parent().parent().parent();
            $(divparent).find("input[name='endereco']").val(endjson.logradouro);
            $(divparent).find("input[name='complemento']").val(endjson.complemento);
            $(divparent).find("input[name='bairro']").val(endjson.bairro);
            $(divparent).find("input[name='cidade']").val(endjson.localidade);
            $(divparent).find("input[name='estado']").val(endjson.uf);
            $(divparent).find("input[name='num']").focus();            
            $(divparent).find(".lista-endereco").html("");
        }
    </script>
@endsection