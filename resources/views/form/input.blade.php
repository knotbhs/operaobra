<div class="{{ isset($size) ? $size : "col-12" }}">
    @if(isset($label))
        <label for="{{ isset($id) ? $id : "idRand" }}">{{ isset($label) ? $label : "Preencha" }}</label>
    @endif
    {{ Form::text(isset($id) ? $id : "idRand", isset($value) ? $value : null, array_merge(["id" => isset($id) ? $id : "idRand","class" => $class], $attributes)) }}
</div>