<?php

namespace App\Http\Controllers;

use App\Models\CodigoDescuentoModel;
use App\Models\CostoEnvioModel;
use App\Models\ProductoModel;
use App\Models\ProductoTamanoModel;
use Illuminate\Http\Request;
use Cart;

class PagoController extends Controller
{
    public function aplicar_codigo_descuento(Request $request)
    {
        $getDescuento = CodigoDescuentoModel::CheckDescuento($request->codigo_descuento);
        if (!empty($getDescuento)) {
            $total = Cart::getSubTotal();

            if ($getDescuento->tipo == 'Cantidad') {
                $descuento_cantidad = $getDescuento->porcentaje_cantidad;
                $total_pagable = $total - $getDescuento->porcentaje_cantidad;
            } else {
                $descuento_cantidad = ($total * $getDescuento->porcentaje_cantidad) / 100;
                $total_pagable = $total - $descuento_cantidad;
            }

            $json['status'] = true;
            $json['descuento_cantidad'] = number_format($descuento_cantidad, 2);
            $json['total_pagable'] = $total_pagable;
            $json['message'] = "success";
        } else {
            $json['status'] = false;
            $json['descuento_cantidad'] = '0.00';
            $json['total_pagable'] = Cart::getSubTotal();
            $json['message'] = "Código de descuento inválido!";
        }

        echo json_encode($json, JSON_UNESCAPED_UNICODE);
    }

    public function pagar(Request $request)
    {
        $data['meta_titulo'] = 'Pagar';
        $data['meta_descripcion'] = '';
        $data['meta_p_clave'] = '';

        $data['getEnvio'] = CostoEnvioModel::getRecordActive();

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

    public function realizar_pedido(Request $request)
    {
        dd($request->all());
    }
}
