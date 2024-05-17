<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComentarioModel extends Model
{
    use HasFactory;

    protected $table = "blog_comentarios";

    static function getSingle($id)
    {
        return self::find($id);
    }

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
