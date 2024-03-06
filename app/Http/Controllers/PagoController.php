<?php

namespace App\Http\Controllers;

use App\Models\ProductoModel;
use App\Models\ProductoTamanoModel;
use Illuminate\Http\Request;
use Cart;

class PagoController extends Controller
{
    public function pagar(Request $request)
    {
        $data['meta_titulo'] = 'Pagar';
        $data['meta_descripcion'] = '';
        $data['meta_p_clave'] = '';

        return view('pagos.pagar', $data);
    }

    public function carrito(Request $request)
    {
        $data['meta_titulo'] = 'Carrito de compras';
        $data['meta_descripcion'] = '';
        $data['meta_p_clave'] = '';

        return view('pagos.carrito', $data);
    }

    public function eliminar_carrito($id)
    {
        Cart::remove($id);

        return redirect()->back();
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

    public function actualizar_carrito(Request $request)
    {
        foreach ($request->carrito as $carrito) {
            Cart::update($carrito['id'], array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $carrito['qty']
                )
            ));
        }

        return redirect()->back();
    }
}
