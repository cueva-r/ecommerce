<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoTamanoModel extends Model
{
    use HasFactory;

    protected $table = "producto_tamano";

    static function deleteRecord($producto_id)
    {
        self::where('producto_id', '=', $producto_id)
        ->delete();
    }
}
