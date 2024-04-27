<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagesModel extends Model
{
    use HasFactory;

    protected $table = "pages";

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static function getRecord()
    {
        return self::select('pages.*')->get();
    }

    static function getSlug($slug)
    {
        return self::where('slug', '=', $slug)->first();
    }

    public function getImagen()
    {
        if (!empty($this->nombre_imagen) && file_exists('upload/pages/' . $this->nombre_imagen)) {
            return url('upload/pages/' . $this->nombre_imagen);
        } else {
            return "";
        }
    }
}
