<p><b>Código: </b>{{$recepcion_documento->codigo}}</p>
<p><b>Fecha y Hora de Recepción: </b>{{$recepcion_documento->fecha_recepcion}} {{$recepcion_documento->hora_recepcion}}</p>
<p><b>Institución: </b>{{$recepcion_documento->institucion->nombre}}</p>
<p><b>Nombre y Cargo del Remitente: </b>{{$recepcion_documento->nombre_remitente}} - {{$recepcion_documento->cargo_remitente}}</p>
<p><b>Asunto: </b>{{$recepcion_documento->asunto}}</p>
<p><b>Área: </b>{{$recepcion_documento->area->nombre}}</p>
<p><b>Caracter: </b>{{$recepcion_documento->caracter}}</p>
<p><b>Anexos: </b>{{$recepcion_documento->anexos}}</p>
<p><b>Nombre y Cargo del Receptor: </b>{{$recepcion_documento->nombre_receptor}} - {{$recepcion_documento->cargo_receptor}}</p>
<p><b>Clasificación: </b>{{$recepcion_documento->clasificacion->nombre}}</p>
<p><b>Estado: </b>{{$recepcion_documento->estado}}</p>
<p><b>Fecha de Registro: </b>{{$recepcion_documento->fecha_registro}}</p>
<h4>Archivos</h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Descripción</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($recepcion_documento->archivos as $archivo)
            <tr class="fila_documentacion existe"
                data-destroy="{{ route('documento_archivos.destroy', $archivo->id) }}">
                <td> {{ $archivo->descripcion }}</td>
                <td class="elimina">
                    <a href="{{ route('documento_archivos.descargar', $archivo->id) }}" style="margin-left:5px;"><i
                            class="fa fa-download"></i> Descargar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
