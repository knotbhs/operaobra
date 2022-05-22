@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ route('empresas') }}">Painel</a> > <a href="{{ route('empresas.painel', [1]) }}">Calhas Scarpari</a> > <a href="{{ route('empresas.servico', [1,2]) }}">Rodrigo dos Santos</a> > <a href="{{ route('empresas.servico.edit', [1,2]) }}" class="text-dark">Editando Serviço</a></div>
                <div class="card-body">                    
                    <div class="card border-primary">
                        <div class="card-body text-primary">
                            {{ Form::open(array('url' => 'foo/bar')) }}
                            <div class="row form-group">
                                @include('form.input', ["value" => "aew", "size" => "col-7","id" => "nome", "label" => "Nome do Cliente:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Nome"]])
                                @include('form.input', ["value" => "aew", "size" => "col-5","id" => "cpfcnpj", "label" => "CPF/CNPJ:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "CPF/CNPJ"]])
                            </div>
                            <div class="endereco1">
                                <div class="row form-group mt-4">
                                    @include('form.input', ["value" => "aew", "size" => "col-4","id" => "cep", "label" => "CEP:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Cep"]])
                                </div>
                                <div class="row form-group">
                                    @include('form.input', ["value" => "aew", "size" => "col-7","id" => "endereco", "label" => "Endereço:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Rua, Av..."]])
                                    @include('form.input', ["value" => "aew", "size" => "col-2","id" => "num", "label" => "Num:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Número"]])
                                    @include('form.input', ["value" => "aew", "size" => "col-3","id" => "complemento", "label" => "Complemento:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Bloco, Casa etc.."]])
                                </div> 
                                <div class="row form-group">
                                    @include('form.input', ["value" => "aew", "size" => "col-4","id" => "bairro", "label" => "Bairro:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Bairro"]])
                                    @include('form.input', ["value" => "aew", "size" => "col-4","id" => "cidade", "label" => "Cidade:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Cidade"]])
                                    @include('form.input', ["value" => "aew", "size" => "col-4","id" => "estado", "label" => "Estado:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Estado"]])
                                </div>
                            </div>     
                            <div class="row form-group mt-4">
                                @include('form.checkbox', ["value" => "aew", "size" => "col-12","id" => "mesmoendereco", "label" => "Endereço da obra diferente:","class" => "form-check-input", "attributes" => []])               
                            </div>
                            <div class="enderecoObra" style="display: none;">
                                <div class="row form-group mt-4">
                                    @include('form.input', ["value" => "aew", "size" => "col-4","id" => "cep", "label" => "CEP:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Cep"]])
                                </div>
                                <div class="row form-group">
                                    @include('form.input', ["value" => "aew", "size" => "col-7","id" => "endereco", "label" => "Endereço:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Rua, Av..."]])
                                    @include('form.input', ["value" => "aew", "size" => "col-2","id" => "num", "label" => "Num:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Número"]])
                                    @include('form.input', ["value" => "aew", "size" => "col-3","id" => "complemento", "label" => "Complemento:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Bloco, Casa etc.."]])
                                </div> 
                                <div class="row form-group">
                                    @include('form.input', ["value" => "aew", "size" => "col-4","id" => "bairro", "label" => "Bairro:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Bairro"]])
                                    @include('form.input', ["value" => "aew", "size" => "col-4","id" => "cidade", "label" => "Cidade:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Cidade"]])
                                    @include('form.input', ["value" => "aew", "size" => "col-4","id" => "estado", "label" => "Estado:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "Estado"]])
                                </div>
                            </div>   
                            
                            {{ Form::close() }}
                            <h6 class="mt-4">Serviços:</h6>
                            <div class="list-group list-group-flush">
                                @for ($i = 0; $i < 5; $i++)      
                                <div class="row">
                                    <div class="col-lg-10 col-md-8 col-sm-8 col-8 list-group-item text-truncate ">{{ $i + 1 }} - Rodrigo, Avenida Casper Libero, 235</div>
                                    <div class="col-lg-2 col-md-4 col-sm-4 col-4 btn-group btn-group-sm" role="group" aria-label="Basic outlined example">
                                        <button type="button" class="btn btn-outline-light text-primary">Editar <i class="fa-pen fa-solid"></i></button>
                                    </div>
                                </div> 
                                @endfor
                                <div class="row">
                                    <div class="col-lg-10 col-md-8 col-sm-8 col-8 text-truncate btn btn-outline-primary">Adicionar Serviço</div>
                                </div>
                            </div> 
                            <div class="row mt-4">
                                <h6 class="col-8">Materiais:</h6>
                            </div>
                            <div class="list-group list-group-flush">
                                @for ($i = 0; $i < 3; $i++)      
                                <div class="row">
                                    <div class="col-lg-10 col-md-8 col-sm-8 col-8 list-group-item text-truncate ">{{ $i + 1 }} - Rodrigo, Avenida Casper Libero, 235</div>
                                    <div class="col-lg-2 col-md-4 col-sm-4 col-4 btn-group btn-group-sm" role="group" aria-label="Basic outlined example">
                                        <button type="button" class="btn btn-outline-light text-primary">Editar <i class="fa-pen fa-solid"></i></button>
                                    </div>
                                </div> 
                                @endfor
                                <div class="row">
                                    <div class="col-lg-10 col-md-8 col-sm-8 col-8 text-truncate btn btn-outline-primary">Adicionar Material</div>
                                </div>
                            </div>                            
                            <div class="card-header mt-4">Valor total estimado: R$ 360,00</div>

                            <div class="mt-4 text-center" role="group" aria-label="Grupo de Botoes">
                                <a href="{{ route('empresas.servico.edit', [1,2]) }}" type="button" class="btn btn-outline-primary">Editar Informações</a>
                                <button type="button" class="btn btn-outline-primary">Finalizar Serviço</button>
                                
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Imprimir <i class="fa-print fa-solid"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <li>
                                            <a class="dropdown-item" href="#">Recibo</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">Orçamento</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">Cobrança</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
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
        function EnderecoDaObra(request)
        {
            
            if($(request).is(":checked"))
            {
                $(".enderecoObra").show();
            }else{
                $(".enderecoObra").hide();
            }
        }
    </script>
@endsection