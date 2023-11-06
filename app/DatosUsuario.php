<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class DatosUsuario extends Model
{
    protected $table = 'datos_usuarios';
    protected $fillable = [
        'nombre', 'paterno', 'materno', 'ci', 'ci_exp', 'dir', 'email', 'fono', 'cel', 'user_id', 'fecha_registro'
    ];

    public function user()
    {
        return $this->belongsTo('app\User', 'user_id', 'id');
    }

    public function doctor()
    {
        return $this->hasOne('app\Doctor', 'datos_usuario_id', 'id');
    }
}
