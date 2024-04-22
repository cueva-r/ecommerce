<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class PedidoItemModel extends Model
{
    use HasFactory;

    protected $table = "item_pedido";

    public function getProducto()
    {
        return $this->belongsTo(ProductoModel::class, 'producto_id');
    }

    static public function getCalificacion($producto_id, $pedido_id)
    {
        return CalificacionProductoModel::getCalificacion($producto_id, $pedido_id, Auth::user()->id);
    }
}
