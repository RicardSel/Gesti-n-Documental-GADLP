<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class ClasificacionDocumento extends Model
{
    protected $fillable = ['nombre', 'descripcion'];

    public function recepciones()
    {
        return $this->hasMany(RecepcionDocumento::class, 'clasificacion_id');
    }
}
