<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostoEnvioModel extends Model
{
    use HasFactory;

    protected $table = "costo_envio";

    static function getSingle($id)
    {
        return self::find($id);
    }

    static function getRecord()
    {
        return self::select('costo_envio.*')
            ->where('costo_envio.esta_eliminado', '=', 0)
            ->orderBy('costo_envio.id', 'desc')
            ->paginate(20);
    }
}
