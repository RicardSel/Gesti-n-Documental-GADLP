<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class RecepcionDocumento extends Model
{
    protected $fillable = [
        'codigo', 'incremento', 'qr', 'fecha_recepcion', 'hora_recepcion',
        'institucion_id', 'nombre_remitente', 'cargo_remitente', 'asunto', 'area_id',
        'caracter', 'anexos', 'nombre_receptor', 'cargo_receptor', 'clasificacion_id',
        'estado', 'fecha_registro', 'status',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function institucion()
    {
        return $this->belongsTo(Institucion::class, 'institucion_id');
    }

    public function clasificacion()
    {
        return $this->belongsTo(ClasificacionDocumento::class, 'clasificacion_id');
    }

    public function archivos()
    {
        return $this->hasMany(DocumentoArchivo::class, 'recepcion_id');
    }

    public function derivacions()
    {
        return $this->hasMany(DerivarDocumento::class, 'recepcion_id');
    }

    public function salida()
    {
        return $this->hasOne(SalidaDocumento::class, 'recepcion_id');
    }

    // FUNCIONES
    public static function ultimoCodigo()
    {
        $codigo = '0001';
        $incremento = 1;
        $ultimo = RecepcionDocumento::orderBy('id', 'desc')->get()->first();
        if ($ultimo) {
            $codigo = (int)$ultimo->incremento + 1;
            $incremento = (int)$ultimo->incremento + 1;
            if ((int)$codigo < 10) {
                $codigo = '000' . $codigo;
            } elseif ($codigo < 100) {
                $codigo = '00' . $codigo;
            } elseif ($codigo < 1000) {
                $codigo = '0' . $codigo;
            }
        }

        return [$codigo, $incremento];
    }
}
