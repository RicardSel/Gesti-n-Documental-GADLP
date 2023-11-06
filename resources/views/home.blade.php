@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Inicio</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Inicio</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            @if (Auth::user()->tipo == 'ADMINISTRADOR')
                @include('includes.home.home_admin')
            @endif
            @if (Auth::user()->tipo == 'OPERADOR')
                @include('includes.home.home_operador')
            @endif

            <div class="row">
                <div class="col-md-12">
                   <div class="card card-default">
                       <div class="card-header">
                           <h4>Cantidad de Documentos</h4>
                           <div class="row" id="filtro_segs">
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Filtro:</label>
                                      <select class="form-control" name="filtro" id="filtro">
                                          <option value="todos">Todos</option>
                                          <option value="estado">Estado</option>
                                          <option value="fecha">Rango de Fechas</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Estado:</label>
                                      <select class="form-control" name="estado" id="estado">
                                          <option value="todos">Todos</option>
                                          <option value="INGRESO">Ingreso</option>
                                          <option value="SALIDA">Salida</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Fecha inicio:</label>
                                      <input type="date" name="fecha_ini" id="fecha_ini" value="{{date('Y-m-d')}}" class="form-control">
                                  </div>
                              </div>
              
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Fecha fin:</label>
                                      <input type="date" name="fecha_fin" id="fecha_fin" value="{{date('Y-m-d')}}" class="form-control">
                                  </div>
                              </div>
                           </div>
                       </div>
                       <div class="card-body">
                           <div id="contenedor_grafico"></div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
    <input type="hidden" value="{{ route('reportes.cantidad_documentos') }}" id="urlInfoGrafico">
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            cargaGrafico();
            $('#filtro').change(cargaGrafico);
            $('#estado').change(cargaGrafico);
            $('#fecha_ini').change(cargaGrafico);
            $('#fecha_fin').change(cargaGrafico);

            var estado = $('#filtro_segs #estado').parents('.form-group');
            var fecha_ini = $('#filtro_segs #fecha_ini').parents('.form-group');
            var fecha_fin = $('#filtro_segs #fecha_fin').parents('.form-group');

            fecha_ini.parents('.col-md-4').hide();
            fecha_fin.parents('.col-md-4').hide();
            estado.parents('.col-md-4').hide();
            $('#filtro_segs select#filtro').change(function() {
                let filtro = $(this).val();
                switch (filtro) {
                    case 'todos':
                        fecha_ini.parents('.col-md-4').hide();
                        fecha_fin.parents('.col-md-4').hide();
                        estado.parents('.col-md-4').hide();
                        break;
                    case 'fecha':
                        fecha_ini.parents('.col-md-4').show();
                        fecha_fin.parents('.col-md-4').show();
                        estado.parents('.col-md-4').hide();
                        break;
                    case 'estado':
                        fecha_ini.parents('.col-md-4').hide();
                        fecha_fin.parents('.col-md-4').hide();
                        estado.parents('.col-md-4').show();
                        break;
                }
            });
        });

        function cargaGrafico() {
            $.ajax({
                type: "GET",
                url: $('#urlInfoGrafico').val(),
                data: {
                    filtro: $('#filtro').val(),
                    estado: $('#estado').val(),
                    fecha_ini: $('#fecha_ini').val(),
                    fecha_fin: $('#fecha_fin').val(),
                },
                dataType: "json",
                success: function(response) {
                    Highcharts.chart('contenedor_grafico', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'CANTIDAD DE DOCUMENTOS'
                        },
                        subtitle: {
                            text: 'TOTAL: '+response.total
                        },
                        xAxis: {
                            type: 'category',
                            crosshair: true,
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Cantidad'
                            }
                        },
                        tooltip: {
                            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
                            footerFormat: '</table>',
                            shared: true,
                            useHTML: true
                        },
                        plotOptions: {
                            column: {
                                pointPadding: 0.2,
                                borderWidth: 0
                            }
                        },
                        series: [{
                            name: 'Cantidad Documentos',
                            colorByPoint: true,
                            data: response.data
                        }],
                        lang: {
                            downloadCSV: 'Descargar CSV',
                            downloadJPEG: 'Descargar imagen JPEG',
                            downloadPDF: 'Descargar Documento PDF',
                            downloadPNG: 'Descargar imagen PNG',
                            downloadSVG: 'Descargar vector de imagen SVG ',
                            downloadXLS: 'Descargar XLS',
                            viewFullscreen: 'Ver pantalla completa',
                            printChart: 'Imprimir',
                            exitFullscreen: 'Salir de pantalla completa'
                        }
                    });

                }
            });
        }
    </script>
@endsection
