<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class SalidaDocumento extends Model
{
    protected $fillable = [
        'recepcion_id', 'fecha', 'hora', 'nombre_receptor',
        'cargo_receptor', 'fecha_registro',
    ];

    public function recepcion()
    {
        return $this->belongsTo(RecepcionDocumento::class, 'recepcion_id');
    }
}
