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