<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class DocumentoArchivo extends Model
{
    protected $fillable = ['recepcion_id', 'descripcion', 'archivo'];
    public function recepcion()
    {
        return $this->belongsTo(RecepcionDocumento::class, 'recepcion_id');
    }
}
