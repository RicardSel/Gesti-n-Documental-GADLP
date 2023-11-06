<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = ['nombre', 'descripcion'];

    public function recepciones()
    {
        return $this->hasMany(RecepcionDocumento::class, 'area_id');
    }

    public function derivacions()
    {
        return $this->hasMany(DerivarDocumento::class, 'area_id');
    }
}
