<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label>Documento*</label>
            {{ Form::select('recepcion_id', $array_recepcion_documentos, null, ['class' => 'form-control', 'required']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Fecha*</label>
            {{ Form::date('fecha', isset($derivar_documento)? $derivar_documento->fecha:date('Y-m-d'), ['class' => 'form-control', 'required']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Hora*</label>
            {{ Form::time('hora', isset($derivar_documento)? $derivar_documento->hora:date('H:i'), ['class' => 'form-control', 'required']) }}
        </div>
    </div>
</div>
<h4>Dirigido a:</h4>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label>Área*</label>
            {{ Form::select('area_id', $array_areas, null, ['class' => 'form-control', 'required']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Carácter*</label>
            {{ Form::select('caracter', ['' => 'Seleccione...', 'URGENTE' => 'URGENTE', 'ORDINARIO' => 'ORDINARIO'], null, ['class' => 'form-control', 'required']) }}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Anexos</label>
            {{ Form::textarea('anexos', null, ['class' => 'form-control', 'rows' => '2']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <button type="button" class="btn btn-primary btn-sm" id="btnNuevaFilaDocumentacion"><i
                class="fa fa-plus"></i> Agregar nueva fila</button>
        <label class="float-left" style="margin-right:8px;">Cargar Archivos (opcional)</label>
        <table class="table table-bordered">
            <tbody id="contenedorDocumentacion">
                @if (isset($derivar_documento))
                    @foreach ($derivar_documento->archivos as $archivo)
                        <tr class="fila_documentacion existe"
                            data-destroy="{{ route('derivacion_archivos.destroy', $archivo->id) }}">
                            <td>
                                <input type="hidden" name="existe_id[]" value="{{ $archivo->id }}">
                                <input class="form-control" name="desc_archivo{{ $archivo->id }}"
                                    value="{{ $archivo->descripcion }}" placeholder="Descripción*" required />
                            </td>
                            <td class="documentacion">
                                <input type="file" name="archivo{{ $archivo->id }}">
                            </td>
                            <td class="elimina">
                                <span class="eliminar"><i class="fa fa-trash"></i> Eliminar</span>
                                <a href="{{ route('derivacion_archivos.descargar', $archivo->id) }}"
                                    style="margin-left:5px;"><i class="fa fa-download"></i> Descargar</a>
                                <div class="info_editable" data-url="" data-col="nombre" data-destroy="">
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
