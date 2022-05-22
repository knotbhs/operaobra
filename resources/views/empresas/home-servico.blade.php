@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ route('empresas') }}">Painel</a> > <a href="{{ route('empresas.painel', [1]) }}">Calhas Scarpari</a> > <a href="{{ route('empresas.servico', [1,2]) }}">Rodrigo dos Santos</a></div>
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
                                @include('empresas.servicos.menu')
                            {{-- FINAL DO MENU --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection