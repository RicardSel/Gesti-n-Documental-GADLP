$(document).ready(function() {
    compruebaEstados();
    setInterval(compruebaEstados, 3000)
});

function compruebaEstados() {
    $.ajax({
        type: "get",
        url: $('#urlListaEstados').val(),
        dataType: "json",
        success: function(response) {
            $('#contenedorLista').html(response.lista_is);
            for (let val in response.herramientas) {
                if (response.herramientas[val].estado == 'SALIDA') {
                    $('#herramienta' + response.herramientas[val].id).removeClass('ingreso');
                    $('#herramienta' + response.herramientas[val].id).addClass('salida');
                    $('#herramienta' + response.herramientas[val].id).children('td').eq(2).text('SALIDA');
                } else {
                    $('#herramienta' + response.herramientas[val].id).removeClass('salida');
                    $('#herramienta' + response.herramientas[val].id).addClass('ingreso');
                    $('#herramienta' + response.herramientas[val].id).children('td').eq(2).text('INGRESO');
                }
            }
        }
    });
}