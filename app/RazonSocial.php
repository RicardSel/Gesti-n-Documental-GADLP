<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class RazonSocial extends Model
{
    protected $fillable = [
        'nombre', 'alias', 'ciudad', 'dir', 'nit',
        'nro_aut', 'fono', 'cel', 'casilla', 'correo',
        'web', 'logo', 'actividad_economica',
    ];
}
