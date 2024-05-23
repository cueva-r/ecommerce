<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

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

    static public function getUnreadNotifications()
    {
        return NotificacionModel::where('esta_leido', '=', 0)
            ->where('user_id', '=', 1)
            ->orderBy('id', 'desc')
            ->get();
    }

    static public function getRecord()
    {
        return NotificacionModel::where('user_id', '=', 1)
            ->orderBy('id', 'desc')
            ->get();
    }

    static public function updatedReadNoti($id)
    {
        $getRecord = NotificacionModel::getSingle($id);
        if (!empty($getRecord)) {
            $getRecord->esta_leido = 1;
            $getRecord->save();
        }
    }
}
