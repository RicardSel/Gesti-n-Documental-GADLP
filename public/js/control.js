var hora = null;
var minutos = null;
var am_pm = null;
var dia = null;
var mes = null;
var anio = null;

var datos = {
    accion: null,
    hora: null,
    fecha: null,
    herramienta_id: null,
};

var seccion = null;

var contador = 10;
var conteo = null;

var busqueda = null;
var rfid_aux = null;

var seccion = null;

$(document).ready(function() {
    $('#rfid').focus();
    setInterval(reloj, 1000);
    $('#rfid').click(function() {
        $(this).select();
    });

    // OBTIENE LA ACCION AL PASAR UNA TARJETA RFID
    $('#rfid').keypress(function(e) {
        let code = (e.keyCode ? e.keyCode : e.which);
        if (code == 13) {
            rfid_aux = $(this).val();
            cargaAccion();
            $(this).val('');
            $(this).focus();
            return false;
        }
    });
});

function cargaAccion() {
    $.ajax({
        type: "get",
        url: $('#url_accion').val(),
        data: { rfid: $('#rfid').val() },
        dataType: "json",
        success: function(response) {
            console.log(response);
            if (response.msg == 'bien') {
                datos.accion = response.accion,
                    datos.hora = `${hora}:${minutos}`,
                    datos.fecha = `${anio}-${mes}-${dia}`,
                    datos.herramienta_id = response.herramienta_id

                $('#marcado').text(`SE REGISTRO A HRS.: ${$('#txtHora').val()} ${am_pm}`);

                // REGISTRO DE INGRESO/SALIDA
                $('#rfid').val('');
                $('#rfid').focus();
                $('#marcado').text('');
                guardaIngresoSalida();
                swal({
                    html: true,
                    title: `${datos.accion}`,
                    text: `REGISTRO CORRECTO`,
                    timer: 3000,
                    showConfirmButton: true,
                    confirmButtonColor: '#6bf3a4',
                    type: 'success',
                });
            } else {
                swal({
                    title: "ERROR",
                    text: "Algo salio mal. Verifique que este usando el código correcto.",
                    timer: 3000,
                    showConfirmButton: false,
                    type: 'error'
                });
            }
        }
    });
}

// REGISTRAR LOS INGRESOS Y SALIDAS
function guardaIngresoSalida() {
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('#token').val() },
        type: "POST",
        url: $('#url_guarda').val(),
        data: datos,
        dataType: "json",
        success: function(response) {
            if (response.msg == 'bien') {} else {
                swal({
                    title: "ERROR",
                    text: "NO SE PUDO ACTUALIZAR LOS REGISTROS. POR FAVOR INTENTE NUEVAMENTE",
                    timer: 2500,
                    showConfirmButton: false,
                    type: 'error'
                });
            }
        }
    }).fail(function() {
        swal({
            title: "ERROR DE SISTEMA",
            text: "ALGO SALIÓ MAL. INTENTE MAS TARDÉ.",
            timer: 2500,
            showConfirmButton: false,
            type: 'error'
        });
    });
}

function limpiar() {
    datos.accion = null;
    datos.hora = null;
    datos.fecha = null;
    datos.herramienta_id = null;
}

// RELOJ DE INICIO
function reloj() {
    let meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");;
    let fecha_hora = new Date();
    dia = (fecha_hora.getDate() < 10) ? '0' + fecha_hora.getDate() : fecha_hora.getDate();
    mes = fecha_hora.getMonth();
    anio = fecha_hora.getFullYear();
    $('#fecha').text((dia + " de " + meses[mes] + " de " + anio));
    mes++;
    mes = (mes < 10) ? '0' + mes : mes;
    hora = (fecha_hora.getHours() < 10) ? '0' + fecha_hora.getHours() : fecha_hora.getHours();
    minutos = (fecha_hora.getMinutes() < 10) ? '0' + fecha_hora.getMinutes() : fecha_hora.getMinutes();
    let segundos = (fecha_hora.getSeconds() < 10) ? '0' + fecha_hora.getSeconds() : fecha_hora.getSeconds();
    am_pm = (fecha_hora.getHours() < 12) ? 'a.m.' : 'p.m.';
    $('#reloj').html(`${hora} : ${minutos} : ${segundos} ${am_pm}`);
}