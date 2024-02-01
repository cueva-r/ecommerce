<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoModel extends Model
{
    use HasFactory;

    protected $table = "productos";

    static function getSingle($id)
    {
        return self::find($id);
    }

    static function checkSlug($slug)
    {
        return self::where('slug', '=', $slug)->count();
    }
}
