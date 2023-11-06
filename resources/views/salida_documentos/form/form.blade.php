<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label>Código de Documento*</label>
            {{ Form::select('recepcion_id', $array_recepcion_documentos, null, ['class' => 'form-control', 'required']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Fecha de Salida*</label>
            {{ Form::date('fecha', isset($salida_documento) ? $salida_documento->fecha : date('Y-m-d'), ['class' => 'form-control', 'required']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Hora de Salida*</label>
            {{ Form::time('hora', isset($salida_documento) ? $salida_documento->hora : date('H:i'), ['class' => 'form-control', 'required']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Nombre del Receptor*</label>
            {{ Form::text('nombre_receptor', null, ['class' => 'form-control', 'required']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Cargo del Receptor*</label>
            {{ Form::text('cargo_receptor', null, ['class' => 'form-control', 'required']) }}
        </div>
    </div>
</div>
