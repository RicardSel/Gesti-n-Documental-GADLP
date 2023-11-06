<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Nombre*</label>
            {{ Form::text('nombre', null, ['class' => 'form-control', 'required']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Descripción</label>
            {{ Form::text('descripcion', null, ['class' => 'form-control']) }}
        </div>
    </div>
</div>
