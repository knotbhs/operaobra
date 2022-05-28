@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ route('empresas') }}">Painel</a> > <a href="{{ route('empresas.painel', [1]) }}">Calhas Scarpari</a> > <a href="{{ route('empresas.servico', [1,2]) }}">Rodrigo dos Santos</a> > <a href="{{ route('empresas.servico.edit', [1,2]) }}" class="text-dark">Editando Serviço</a></div>
                <div class="card-body">                    
                    <div class="card border-primary">
                        <div class="card-body">
                            @include('empresas.servicos.form.edit-material')
                            <h6 class="mt-2 px-2 text-primary">Informações pessoais:</h6>
                            {{ Form::open(array('url' => 'foo/bar')) }}
                                {{-- INICIO DOS FORMULARIOS --}}  
                                    @include('empresas.servicos.form.info-pessoal')
                                    @include('empresas.servicos.form.enderecos')   
                                {{-- FIM DOS FORMULARIOS --}}                           
                            {{ Form::close() }}
                            
                            {{-- INICIO ROW DE SERVIÇOS E MATERIAIS --}}              
                            <hr>              
                                @include('empresas.servicos.row-servicos', ['edit' => true])                            
                            <hr>
                                @include('empresas.servicos.row-materiais', ['edit' => true])                          
                            <hr>
                            {{-- FIM ROW DE SERVIÇOS E MATERIAIS --}}
                            {{-- INICIO DO MENU --}}
                                @include('empresas.servicos.menu',["edit" => false])
                                {{-- FINAL DO MENU --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


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
        
        function editarItem(request)
        {
            let parent = $(request).parent().parent();
            let items = $(parent).find(".item").find("div");
            $(items).each(function(){
                let text = $(this).html().split();
                let name = $(this).attr("special");
                if(name == 'valor')
                {
                    $("input#valor").val(text);
                }else if(name == 'name')
                {
                    $("textarea#servico").val(text);
                }else if(name == 'id')
                {
                    $("input#idItem").val(text);
                }

            });
            myModal.show();
        }
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
            keyboard: false
            })
    </script>
@endsection