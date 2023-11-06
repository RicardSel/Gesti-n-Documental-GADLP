let nroNotificaciones = $('#nroNotificaciones');
let contenedorNotificaciones = $('#contenedorNotificaciones');
let totalNotificaciones = $('#totalNotificaciones');
let sw = false;

$(document).ready(function() {
    totalNotificaciones.val('0');
    notificaciones();
    sw = false;
    setInterval(notificaciones, 2000);
});

function notificaciones() {
    $.ajax({
        type: "GET",
        url: $('#urlNotificaciones').val(),
        dataType: "json",
        success: function(response) {
            if (parseInt(totalNotificaciones.val()) != response.total) {
                totalNotificaciones.val(response.total);
                contenedorNotificaciones.html(response.html);
            }
            if (parseInt(nroNotificaciones.text()) < parseInt(response.sinVer)) {
                mensajeNotificacion2('Tienes notificaciones para ver', 'bg-warning', 'Notificaciones');
                nroNotificaciones.text(response.sinVer);
            }
        }
    });
}