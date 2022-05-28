@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ route('empresas') }}">Painel</a> > <a href="{{ route('empresas.painel', [$empresa->id]) }}">{{ $empresa->name }}</a> > <a href="{{ route('empresas.servico', [$empresa->id, $orcamento->id]) }}">{{$cliente->name}}</a></div>
                <div class="card-body">                    
                    <div class="card border-primary">
                        <div class="card-body">
                            {{-- INICIO DA INFORMAÇÃO PRINCIPAL --}}
                            @include('empresas.servicos.row-info-pessoal')
                            {{-- FINAL DA INFORMAÇÃO PESSOAL --}}
                            {{-- INICIO ROW DE SERVIÇOS E MATERIAIS --}}              
                            <hr>              
                                @include('empresas.servicos.row-servicos')                            
                            <hr>
                                @include('empresas.servicos.row-materiais')                          
                            <hr>
                            {{-- FIM ROW DE SERVIÇOS E MATERIAIS --}}
                            {{-- INCIO DO VALOR TOTAL DO ORÇAMENTO --}}                            
                                @include('empresas.servicos.row-valor-total')  
                            {{-- FIM DO VALOR TOTAL DO ORÇAMENTO --}}
                            {{-- INICIO DO MENU --}}
                                @include('empresas.servicos.menu',["edit" => true])
                            {{-- FINAL DO MENU --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection