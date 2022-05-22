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