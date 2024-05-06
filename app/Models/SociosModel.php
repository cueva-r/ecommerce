<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SociosModel extends Model
{
    use HasFactory;

    protected $table = "socios";

    static function getSingle($id)
    {
        return self::find($id);
    }

    static function getRecord()
    {
        return self::select('socios.*')
            ->where('socios.esta_eliminado', '=', 0)
            ->orderBy('socios.id', 'desc')
            ->paginate(20);
    }

    static function getRecordActive()
    {
        return self::select('socios.*')
            ->where('socios.esta_eliminado', '=', 0)
            ->where('socios.estado', '=', 0)
            ->orderBy('socios.id', 'asc')
            ->get();
    }

    public function getImagen()
    {
        if (!empty($this->nombre_imagen) && file_exists('upload/socios/' . $this->nombre_imagen)) {
            return url('upload/socios/' . $this->nombre_imagen);
        } else {
            return "";
        }
    }
}
