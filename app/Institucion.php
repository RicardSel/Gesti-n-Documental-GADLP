<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    protected $fillable = ['nombre', 'descripcion'];

    public function recepciones()
    {
        return $this->hasMany(RecepcionDocumento::class, 'institucion_id');
    }
}
