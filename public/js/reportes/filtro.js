$(document).ready(function() {
    usuarios();
    recepcion_documentos();
    seguimiento_documentos();
    cantidad_documentos();
});

function usuarios() {
    var tipo = $('#m_usuarios #tipo').parents('.form-group');
    var fecha_ini = $('#m_usuarios #fecha_ini').parents('.form-group');
    var fecha_fin = $('#m_usuarios #fecha_fin').parents('.form-group');

    fecha_ini.hide();
    fecha_fin.hide();
    tipo.hide();
    $('#m_usuarios select#filtro').change(function() {
        let filtro = $(this).val();
        switch (filtro) {
            case 'todos':
                tipo.hide();
                fecha_ini.hide();
                fecha_fin.hide();
                break;
            case 'tipo':
                tipo.show();
                fecha_ini.hide();
                fecha_fin.hide();
                break;
            case 'fecha':
                tipo.hide();
                fecha_ini.show();
                fecha_fin.show();
                break;
        }
    });
}

function recepcion_documentos() {
    var fecha_ini = $('#m_recepcion_documentos #fecha_ini').parents('.form-group');
    var fecha_fin = $('#m_recepcion_documentos #fecha_fin').parents('.form-group');

    fecha_ini.hide();
    fecha_fin.hide();
    $('#m_recepcion_documentos select#filtro').change(function() {
        let filtro = $(this).val();
        switch (filtro) {
            case 'todos':
                fecha_ini.hide();
                fecha_fin.hide();
                break;
            case 'fecha':
                fecha_ini.show();
                fecha_fin.show();
                break;
        }
    });
}

function seguimiento_documentos() {
    var codigo = $('#m_seguimiento_documentos #codigo').parents('.form-group');
    var fecha_ini = $('#m_seguimiento_documentos #fecha_ini').parents('.form-group');
    var fecha_fin = $('#m_seguimiento_documentos #fecha_fin').parents('.form-group');

    fecha_ini.hide();
    fecha_fin.hide();
    codigo.hide();
    $('#m_seguimiento_documentos select#filtro').change(function() {
        let filtro = $(this).val();
        switch (filtro) {
            case 'todos':
                codigo.hide();
                fecha_ini.hide();
                fecha_fin.hide();
                break;
            case 'codigo':
                codigo.show();
                fecha_ini.hide();
                fecha_fin.hide();
                break;
            case 'fecha':
                codigo.hide();
                fecha_ini.show();
                fecha_fin.show();
                break;
        }
    });
}

function cantidad_documentos() {
    var estado = $('#m_cantidad_documentos #estado').parents('.form-group');
    var fecha_ini = $('#m_cantidad_documentos #fecha_ini').parents('.form-group');
    var fecha_fin = $('#m_cantidad_documentos #fecha_fin').parents('.form-group');

    fecha_ini.hide();
    fecha_fin.hide();
    estado.hide();
    $('#m_cantidad_documentos select#filtro').change(function() {
        let filtro = $(this).val();
        switch (filtro) {
            case 'todos':
                estado.hide();
                fecha_ini.hide();
                fecha_fin.hide();
                break;
            case 'estado':
                estado.show();
                fecha_ini.hide();
                fecha_fin.hide();
                break;
            case 'fecha':
                estado.hide();
                fecha_ini.show();
                fecha_fin.show();
                break;
        }
    });
}