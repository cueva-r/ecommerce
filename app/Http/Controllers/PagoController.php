<?php

namespace App\Http\Controllers;

use App\Models\ProductoModel;
use App\Models\ProductoTamanoModel;
use Illuminate\Http\Request;
use Cart;

class PagoController extends Controller
{
    public function carrito(Request $request)
    {
        dd(Cart::getContent());
    }

    public function agregar_al_carrito(Request $request)
    {
        $getProducto = ProductoModel::getSingle($request->producto_id);
        $total = $getProducto->precio;
        if (!empty($request->size_id)) {
            $tamano_id = $request->size_id;
            $getTamano = ProductoTamanoModel::getSingle($tamano_id);

            $tamano_precio = !empty($getTamano->precio) ? $getTamano->precio : 0;
            $total = $total + $tamano_precio;
        } else {
            $tamano_id = 0;
        }

        $color_id = !empty($request->color_id) ? $request->color_id : 0;

        Cart::add([
            'id' => $getProducto->id,
            'name' => 'Producto',
            'price' => $total,
            'quantity' => $request->qty,
            'attributes' => array(
                'size_id' => $tamano_id,
                'color_id' => $color_id,
            ),
        ]);

        return redirect()->back();
    }
}
