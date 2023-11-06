$(document).ready(function() {
    function onScanSuccess(decodedText, decodedResult) {
        // Handle the scanned code as you like, for example:
        // console.log(`Code matched = ${decodedText}`, decodedResult);
        $('#contenedorBusqueda').html('Cargando...');
        $.ajax({
            type: "GET",
            url: $('#urlGetInfoQr').val(),
            data: { codigo: decodedText },
            dataType: "json",
            success: function(response) {
                $('#contenedorBusqueda').html(response.html);
            }
        }).fail(function() {
            $('#contenedorBusqueda').html('Erro. Algo salió mal intente nuevamente por favor...');
        });
    }

    const formatsToSupport = [
        Html5QrcodeSupportedFormats.QR_CODE,
        Html5QrcodeSupportedFormats.UPC_A,
        Html5QrcodeSupportedFormats.UPC_E,
        Html5QrcodeSupportedFormats.UPC_EAN_EXTENSION,
    ];
    const html5QrcodeScanner = new Html5QrcodeScanner(
        "camara", {
            fps: 10,
            qrbox: { width: 250, height: 250 },
            formatsToSupport: formatsToSupport
        },
        /* verbose= */
        false);
    html5QrcodeScanner.render(onScanSuccess);

});