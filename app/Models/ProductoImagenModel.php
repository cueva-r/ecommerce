<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoImagenModel extends Model
{
    use HasFactory;

    protected $table = "producto_imagen";

    static function getSingle($id)
    {
        return self::find($id);
    }

    public function getLogo()
    {
        if (!empty($this->nombre_imagen) && file_exists('upload/productos/' . $this->nombre_imagen)) {
            return url('upload/productos/' . $this->nombre_imagen);
        } else {
            return "";
        }
    }
}
