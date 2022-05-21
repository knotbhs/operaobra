@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ route('empresas') }}">Painel</a> > <a href="{{ route('empresas.painel', [1]) }}">Calhas Scarpari </a></div>
                <div class="card-body">
                    
                    <div class="card border-success mb-4" style="max-width: 18rem;">
                        <div class="card-body text-success">
                            <h5 class="card-title">Serviços em Iniciados</h5>
                            <p class="card-text">Total: 5</p>
                            <ul class="list-group list-group-flush">
                                @for ($i = 0; $i < 5; $i++)                                    
                                    <a href="{{ route('empresas.servico', [1, 2]) }}" class="list-group-item text-truncate ">{{ $i + 1 }} - Rodrigo, Avenida Casper Libero, 235 <span class="badge bg-success">OK</span></a>
                                @endfor
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