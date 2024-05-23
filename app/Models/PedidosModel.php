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

    public function getEnvio()
    {
        return $this->belongsTo(CostoEnvioModel::class, 'envio_id');
    }

    public function getArticulo()
    {
        return $this->hasMany(PedidoItemModel::class, 'pedido_id');
    }

    // parte cliente

    static function mostrarTotalPedidosCliente($user_id)
    {
        return self::select('id')
            ->where('user_id', '=', $user_id)
            ->where('esta_pagado', '=', 1)
            ->where('esta_eliminado', '=', 0)
            ->count();
    }

    static function mostrarTotalPedidosHoyCliente($user_id)
    {
        return self::select('id')
            ->where('user_id', '=', $user_id)
            ->where('esta_pagado', '=', 1)
            ->where('esta_eliminado', '=', 0)
            ->whereDate('created_at', '=', date('Y-m-d'))
            ->count();
    }

    static function mostrarCantidadTotalCliente($user_id)
    {
        return self::select('id')
            ->where('user_id', '=', $user_id)
            ->where('esta_pagado', '=', 1)
            ->where('esta_eliminado', '=', 0)
            ->sum('cantidad_total');
    }

    static function mostrarCantidadTotalHoyCliente($user_id)
    {
        return self::select('id')
            ->where('user_id', '=', $user_id)
            ->where('esta_pagado', '=', 1)
            ->where('esta_eliminado', '=', 0)
            ->whereDate('created_at', '=', date('Y-m-d'))
            ->sum('cantidad_total');
    }

    static function mostrarEstadoPedidoCliente($user_id, $estado)
    {
        return self::select('id')
            ->where('user_id', '=', $user_id)
            ->where('estado', '=', $estado)
            ->where('esta_pagado', '=', 1)
            ->where('esta_eliminado', '=', 0)
            ->count();
    }

    static function getRecordCliente($user_id)
    {
        return PedidosModel::select('pedidos.*')
            ->where('user_id', '=', $user_id)
            ->where('esta_pagado', '=', 1)
            ->where('esta_eliminado', '=', 0)
            ->orderBy('id', 'desc')
            ->get();
    }

    static function getSingleCliente($user_id, $id)
    {
        return PedidosModel::select('pedidos.*')
            ->where('user_id', '=', $user_id)
            ->where('id', '=', $id)
            ->where('esta_pagado', '=', 1)
            ->where('esta_eliminado', '=', 0)
            ->first();
    }

    // fin cliente

    static function mostrarTotalPedidos()
    {
        return self::select('id')
            ->where('esta_pagado', '=', 1)
            ->where('esta_eliminado', '=', 0)
            ->count();
    }

    static function mostrarTotalPedidosHoy()
    {
        return self::select('id')
            ->where('esta_pagado', '=', 1)
            ->where('esta_eliminado', '=', 0)
            ->whereDate('created_at', '=', date('Y-m-d'))
            ->count();
    }

    static function mostrarTotalPedidosPorMes($fecha_inicio, $fecha_fin)
    {
        return self::select('id')
            ->where('esta_pagado', '=', 1)
            ->where('esta_eliminado', '=', 0)
            ->whereDate('created_at', '>=', $fecha_inicio)
            ->whereDate('created_at', '<=', $fecha_fin)
            ->count();
    }

    static function mostrarTotalCantidadPedidosPorMes($fecha_inicio, $fecha_fin)
    {
        return self::select('id')
            ->where('esta_pagado', '=', 1)
            ->where('esta_eliminado', '=', 0)
            ->whereDate('created_at', '>=', $fecha_inicio)
            ->whereDate('created_at', '<=', $fecha_fin)
            ->sum('cantidad_total');
    }

    static function mostrarCantidadTotal()
    {
        return self::select('id')
            ->where('esta_pagado', '=', 1)
            ->where('esta_eliminado', '=', 0)
            ->sum('cantidad_total');
    }

    static function mostrarCantidadTotalHoy()
    {
        return self::select('id')
            ->where('esta_pagado', '=', 1)
            ->where('esta_eliminado', '=', 0)
            ->whereDate('created_at', '=', date('Y-m-d'))
            ->sum('cantidad_total');
    }

    static function mostrarUltimosPedidos()
    {
        return PedidosModel::select('pedidos.*')
            ->where('esta_pagado', '=', 1)
            ->where('esta_eliminado', '=', 0)
            ->paginate(10);
    }
}
