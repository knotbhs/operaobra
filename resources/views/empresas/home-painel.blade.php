@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ route('empresas') }}">Painel</a> > <a href="{{ route('empresas.painel', [$empresa_id]) }}">{{ $name_empresa }}</a></div>
                <div class="card-body">                    
                    <div class="card border-success mb-12" >
                        <div class="card-body text-success">
                            <h5 class="card-title">Serviços em Iniciados</h5>
                            <p class="card-text">Total: {{ isset($orcamentos) ? count($orcamentos) : 0 }}</p>
                            <ul class="list-group list-group-flush">         
                                @isset($orcamentos)                      
                                    @for ($i = 0; $i < count($orcamentos); $i++)                                    
                                        <a href="{{ route('empresas.servico', [$empresa_id, $orcamentos[$i]['id']]) }}" class="list-group-item col-12"><div class="row"><span class="col-9 col-lg-10 col-md-9 text-truncate">{{ $orcamentos[$i]['id'] }} - {{ $orcamentos[$i]['text'] }}</span><span class="col-3 col-lg-2 col-md-3">{!! $orcamentos[$i]['etapa'] !!}</span></div></a>
                                    @endfor                                    
                                @endisset 
                            </ul>                            
                            <div class="card-header">Valor total estimado: R$ 360,00</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection