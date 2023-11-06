<div class="modal fade" id="m_seguimiento_documentos">
    <div class="modal-dialog">
        <div class="modal-content  bg-sucess">
            <div class="modal-header">
                <h4 class="modal-title">SEGUIMIENTO DE DOCUMENTOS</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'reportes.seguimiento_documentos', 'method' => 'get', 'target' => '_blank', 'id' =>
                'formseguimiento_documentos']) !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Filtro:</label>
                            <select class="form-control" name="filtro" id="filtro">
                                <option value="todos">Todos</option>
                                <option value="codigo">Código Documento</option>
                                <option value="fecha">Rango de Fechas</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Código:</label>
                            <select class="form-control" name="codigo" id="codigo">
                                <option value="todos">Todos</option>
                                @foreach($recepcion_documentos as $recepcion)
                                <option value="{{$recepcion->id}}">{{$recepcion->codigo}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Fecha inicio:</label>
                            <input type="date" name="fecha_ini" id="fecha_ini" value="{{date('Y-m-d')}}" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Fecha fin:</label>
                            <input type="date" name="fecha_fin" id="fecha_fin" value="{{date('Y-m-d')}}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-info" id="btnseguimiento_documentos">Generar reporte</button>
                {!! Form::close() !!}
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
