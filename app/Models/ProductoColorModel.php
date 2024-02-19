<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoColorModel extends Model
{
    use HasFactory;

    protected $table = "productos_colores";

    static function deleteRecord($producto_id)
    {
        self::where('producto_id', '=', $producto_id)
        ->delete();
    }

    public function getColor()
    {
        return $this->belongsTo(ColorModel::class, 'color_id');
    }
}
