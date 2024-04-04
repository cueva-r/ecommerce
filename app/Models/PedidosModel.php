<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidosModel extends Model
{
    use HasFactory;

    protected $table = "pedidos";

    static function getSingle($id)
    {
        return self::find($id);
    }

    static function getRecord()
    {
        $return = PedidosModel::select('pedidos.*')
            ->where('esta_pagado', '=', 1)
            ->where('esta_eliminado', '=', 0)
            ->orderBy('id', 'desc')
            ->get();

        return $return;
    }
}
