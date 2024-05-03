<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlidersModel extends Model
{
    use HasFactory;

    protected $table = "sliders";

    static function getSingle($id)
    {
        return self::find($id);
    }

    static function getRecord()
    {
        return self::select('sliders.*')
            ->where('sliders.esta_eliminado', '=', 0)
            ->orderBy('sliders.id', 'desc')
            ->paginate(20);
    }

    static function getRecordActive()
    {
        return self::select('sliders.*')
            ->where('sliders.esta_eliminado', '=', 0)
            ->where('sliders.estado', '=', 0)
            ->orderBy('sliders.id', 'asc')
            ->get();
    }

    public function getImagen()
    {
        if (!empty($this->nombre_imagen) && file_exists('upload/sliders/' . $this->nombre_imagen)) {
            return url('upload/sliders/' . $this->nombre_imagen);
        } else {
            return "";
        }
    }
}
