@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="{{ route('empresas') }}">Painel</a></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="list-group list-group-numbered">
                    @foreach($empresas as $empresa)
                        <a href="{{ route('empresas.painel', $empresa['empresa-id']) }}" class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">{{ $empresa['empresa-nome'] }}</div>
                                {{ $empresa['empresa-descricao-breve'] }}
                            </div>
                            <span class="badge bg-primary rounded-pill">{{ $empresa['empresa-notificacoes-count'] }}</span>
                        </a>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection