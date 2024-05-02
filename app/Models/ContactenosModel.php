<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactenosModel extends Model
{
    use HasFactory;

    protected $table = "contactenos";

    static public function geSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        return self::select('contactenos.*')
            ->orderBy('contactenos.id', 'desc')
            ->paginate(20);
    }

    public function getUsuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
