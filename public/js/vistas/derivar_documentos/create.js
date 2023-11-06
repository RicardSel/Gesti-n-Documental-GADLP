let fila_documentacion = `<tr class="fila_documentacion">
                            <td>
                                <input class="form-control" name="desc_archivo[]" placeholder="Descripción*" required/>
                            </td> 
                            <td class="documentacion">
                                <input type="file" name="archivo[]" required>
                            </td>
                            <td class="elimina">
                                <span class="eliminar"><i class="fa fa-trash"></i> Eliminar</span>
                                <div class="info_editable" data-url="" data-col="nombre" data-destroy="">
                                </div>
                            </td>
                        </tr>`;

let index_adjuntos = 0;

let urlStoreDocumentacion = $('#urlStoreDocumentacion').val();
let urlDestroyDocumentacion = $('#urlDestroyDocumentacion').val();
let elementoSelectDocumentacion = $('#elementoSelectDocumentacion').html();
let contenedorDocumentacion = $('#contenedorDocumentacion');
let btnNuevaFilaDocumentacion = $('#btnNuevaFilaDocumentacion');

let btnGuardar = $('#btnGuardar');

$(document).ready(function() {
    compruebaFilasDocumentacion();

    btnNuevaFilaDocumentacion.click(function() {
        nuevaFilaDocumentacion();
        compruebaFilasDocumentacion();
    });

    $('#contenedorDocumentacion').on('click', 'tr td.elimina span.eliminar', function(e) {
        e.preventDefault();
        let fila = $(this).closest('tr');
        if (fila.hasClass('existe')) {
            $.ajax({
                headers: {
                    'x-csrf-token': $('#token').val()
                },
                type: "DELETE",
                url: fila.attr('data-destroy'),
                dataType: 'json',
                success: function(response) {
                    if (response.sw) {
                        fila.remove();
                    }
                }
            });
        } else {
            fila.remove();
            if (index_adjuntos > 0) {
                index_adjuntos--;
            }
        }
        compruebaFilasDocumentacion();
    });
});

function nuevaFilaDocumentacion() {
    let nueva_fila = $(fila_documentacion).clone();
    let td_doc = nueva_fila.children('td').eq(0);
    let cont_inputs = td_doc.find('.input');
    let input_index = cont_inputs.children('input').eq(1);
    input_index.val(index_adjuntos);

    let td = nueva_fila.children('td').eq(1);
    let info_editable = td.find('.info_editable');
    info_editable.attr('data-url', urlStoreDocumentacion);
    info_editable.attr('data-destroy', urlDestroyDocumentacion);
    info_editable.html(elementoSelectDocumentacion);
    contenedorDocumentacion.append(nueva_fila);
}

function compruebaFilasDocumentacion() {
    let filas = contenedorDocumentacion.children('tr.fila_documentacion');
    if (filas.length > 0) {
        btnGuardar.prop('disabled', false);
    } else {
        btnGuardar.prop('disabled', true);
    }
}