<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificacionModel extends Model
{
    use HasFactory;

    protected $table = "notificacion";

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function insertRecord($user_id, $url, $mensaje)
    {
        $guardar = new NotificacionModel;
        $guardar->user_id = $user_id;
        $guardar->url = $url;
        $guardar->mensaje = $mensaje;
        $guardar->save();
    }
}
