<?php

namespace app;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'password', 'tipo', 'foto', 'estado',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function datosUsuario()
    {
        return $this->hasOne('app\DatosUsuario', 'user_id', 'id');
    }

    public function paciente()
    {
        return $this->hasOne('app\Paciente', 'user_id', 'id');
    }

    public function panels()
    {
        return $this->hasMany(PanelControl::class, 'user_id');
    }

    public function notificacions_user()
    {
        return $this->hasMany(NotificacionUser::class, 'user_id');
    }
}
