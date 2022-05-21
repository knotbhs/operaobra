@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ route('empresas') }}">Painel</a> > <a href="{{ route('empresas.painel', [1]) }}">Calhas Scarpari</a> > <a href="{{ route('empresas.servico', [1,2]) }}">Rodrigo dos Santos</a></div>
                <div class="card-body">                    
                    <div class="card border-primary">
                        <div class="card-body text-primary">
                            <h5 class="card-title" style="max-width: 18em;">
                                Rodrigo dos Santos
                            </h5>
                            <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-primary">
                                Em Andamento
                            </span>
                            <p class="card-text">Rua Tamandaré, 540 - Jd. Paulistano - Ribeirão Preto / SP</p>
                            <h6>Serviços:</h6>
                            <div class="list-group list-group-flush">
                                @for ($i = 0; $i < 5; $i++)      
                                <div class="row">
                                    <div class="col-lg-10 col-md-8 col-sm-8 col-8 list-group-item text-truncate ">{{ $i + 1 }} - Rodrigo, Avenida Casper Libero, 235</div>
                                    <div class="col-lg-2 col-md-4 col-sm-4 col-4 btn-group btn-group-sm" role="group" aria-label="Basic outlined example">
                                        <button type="button" class="btn btn-outline-light text-primary">Editar <i class="fa-pen fa-solid"></i></button>
                                    </div>
                                </div> 
                                @endfor
                            </div>                            
                            <div class="card-header">Valor total estimado: R$ 360,00</div>

                            <div class="mt-4 text-center" role="group" aria-label="Grupo de Botoes">
                                <a href="{{ route('empresas.servico.edit', [1,2]) }}" type="button" class="btn btn-outline-primary">Editar Informações</a>
                                <button type="button" class="btn btn-outline-primary">Finalizar Serviço</button>
                                
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Imprimir <i class="fa-print fa-solid"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <li><a class="dropdown-item" href="#">Recibo</a></li>
                                    <li><a class="dropdown-item" href="#">Orçamento</a></li>
                                    <li><a class="dropdown-item" href="#">Cobrança</a></li>
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