<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresario extends Model
{
    protected $fillable = array('codigo', 'razon_social', 'nombre', 'pais', 'estado', 'ciudad', 'telefono', 'correo',
        'activo');

    public static function desactivar($id){
        $empresario = Self::where('id', $id)->first();
        if(!empty($empresario)){
            $empresario->activo = 0;
            return $empresario->save();
        } else {
            return 0;
        }
    }


}
