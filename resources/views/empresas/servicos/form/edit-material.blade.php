<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editando Servico</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
                @include('form.textarea', ["value" => "", "size" => "col-12 col-lg-12 col-md-12 col-sm-12","id" => "servico", "label" => "Serviço:","class" => "col-form-label form-control", "attributes" => ['rows' => 4, 'cols' => 54, "placeholder" => ""]])
            </div>
            <div class="mb-3">
                @include('form.input', ["value" => "", "size" => "col-12 col-lg-12 col-md-12 col-sm-12","id" => "valor", "label" => "Valor R$:","class" => "col-form-label form-control", "attributes" => ["placeholder" => "R$ 0,00"]])
            </div>
            <input type="hidden" name="idItem" id="idItem" value="">
          </form>          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary">Salvar</button>
        </div>
      </div>
    </div>
</div>