$(document).ready(function () {


    setInterval(reloj,1000);

    $('#formCita').validate({
        errorPlacement: function errorPlacement(error, element) { element.after(error); },
        rules: {
        },
    });
    
    $('#btnGuardaCita').click(function(){
        $('#formCita').submit();
    });

    $('#txt_fecha').change(obtieneHorarios);
    $('#especialidad_id').change(obtieneHorarios);
});


function obtieneHorarios()
{
    if($('#txt_fecha').val() != '' && $('#especialidad_id').val() != '')
    {
        let data = {
            especialidad_id : $('#especialidad_id').val(),
            fecha : $('#txt_fecha').val(),
        };
    
        $.ajax({
            type: "GET",
            url: $('#urlHorarios').val(),
            data: data,
            dataType: "json",
            success: function (response) {
                $('#contenedorHorarios').html(response.html_horarios);   
            }
        });
    }
    else{
        $('#contenedorHorarios').html('');   
    }
}

// RELOJ DE INICIO
function reloj()
{
    let meses = new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");;
    let fecha_hora = new Date();
    dia = (fecha_hora.getDate() < 10)? '0'+fecha_hora.getDate():fecha_hora.getDate();
    mes = fecha_hora.getMonth();
    anio = fecha_hora.getFullYear();
    $('#fecha').text((dia + " de " + meses[mes] + " de " + anio));
    mes++;
    mes = (mes < 10)? '0'+mes:mes;
    hora = (fecha_hora.getHours() < 10)? '0'+fecha_hora.getHours():fecha_hora.getHours();
    minutos = (fecha_hora.getMinutes() < 10)? '0'+fecha_hora.getMinutes():fecha_hora.getMinutes();
    let segundos = (fecha_hora.getSeconds() < 10)? '0'+fecha_hora.getSeconds():fecha_hora.getSeconds();
    am_pm = (fecha_hora.getHours() < 12) ? 'a.m.':'p.m.';
    $('#reloj').html(`${hora} : ${minutos} : ${segundos} ${am_pm}`);
}

// ACTIVA EL RELOJ
function iniciaConteo()
{
    contador = 10;
    conteo = setInterval(function(){
    $('#conteo').text(contador);
        contador--;
        if(contador == -1)
        {
            clearInterval(conteo);
            $('#m_ingreso1').modal('hide');
            $('#rfid').val('');
            $('#rfid').focus();
        }
    },1000);
}