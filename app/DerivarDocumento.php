<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class DerivarDocumento extends Model
{
    protected $fillable = [
        'recepcion_id', 'fecha', 'hora', 'area_id',
        'caracter', 'anexos', 'fecha_registro',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function recepcion()
    {
        return $this->belongsTo(RecepcionDocumento::class, 'recepcion_id');
    }

    public function archivos()
    {
        return $this->hasMany(DerivacionArchivo::class, 'derivacion_id');
    }
}
