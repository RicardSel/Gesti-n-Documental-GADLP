<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class DerivacionArchivo extends Model
{
    protected $fillable = [
        'derivacion_id', 'descripcion', 'archivo'
    ];

    public function derivacion()
    {
        return $this->belongsTo(DerivarDocumento::class, 'derivacion_id');
    }
}
