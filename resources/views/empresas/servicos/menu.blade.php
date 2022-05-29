<div class="mt-4 text-center row" role="group" aria-label="Grupo de Botoes">
    
    <div class="btn-group col-12 pt-2 pt-lg-0" role="group">        
        @if(isset($edit) && $edit)
            <a href="{{ route('empresas.servico.edit', [$empresa['id'], $orcamento['id']]) }}" class="btn btn-outline-primary col-lg-4 col-md-6 col-sm-6 col-6">Editar Informações</a>            
            <a href="#" type="button" class="btn btn-outline-primary col-lg-4 col-md-6 col-sm-6 col-6">Finalizar Serviço</a>
            
            <div class="btn-group col-lg-4 col-md-12 col-sm-12 col-12 pt-2 pt-lg-0" role="group">
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
                    <li>
                        <a class="dropdown-item" href="#">Contrato</a>
                    </li>
                </ul>
            </div>
        @else
            <a href="{{ route('empresas.servico', [$empresa['id'], $orcamento['id']]) }}" class="btn btn-outline-danger col-lg-4 col-md-6 col-sm-6 col-6">Cancelar Alterações</a>            
            <a href="{{ route('empresas.servico', [$empresa['id'], $orcamento['id']]) }}" class="btn btn-outline-primary col-lg-4 col-md-6 col-sm-6 col-6">Salvar Alterações</a>            
        @endif        
    </div>    
</div>