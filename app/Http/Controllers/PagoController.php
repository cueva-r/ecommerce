<?php

namespace App\Http\Controllers;

use App\Mail\FacturaPedidoMail;
use App\Mail\RegisterMail;
use App\Models\CodigoDescuentoModel;
use App\Models\ColorModel;
use App\Models\CostoEnvioModel;
use App\Models\NotificacionModel;
use App\Models\PedidoItemModel;
use App\Models\PedidosModel;
use App\Models\ProductoModel;
use App\Models\ProductoTamanoModel;
use App\Models\User;
use Illuminate\Http\Request;
use Cart;
use Auth;
use Hash;
use Session;
use Mail;
use Stripe\Stripe;

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
        $validate = 0;
        $message = '';

        if (!empty(Auth::check())) {
            $user_id = Auth::user()->id;
        } else {
            if (!empty($request->esta_creado)) {
                $checkEmail = User::checkEmail($request->email);
                if (!empty($checkEmail)) {
                    $message = "Este correo ya existe, intente con otro porfavor!";
                    $validate = 1;
                } else {
                    $save = new User;
                    $save->name = trim($request->nombres);
                    $save->email = trim($request->email);
                    $save->password = Hash::make($request->password);
                    $save->save();

                    $user_id = $save->id;
                }
            } else {
                $user_id = '';
            }
        }

        if (empty($validate)) {
            $getEnvio = CostoEnvioModel::getSingle($request->shipping);
            $total_pagable = Cart::getSubtotal();
            $descuento_cantidad = 0;
            $codigo_descuento = '';

            if (!empty($request->codigo_descuento)) {
                $getDescuento = CodigoDescuentoModel::CheckDescuento($request->codigo_descuento);

                if (!empty($getDescuento)) {
                    if ($getDescuento->tipo == 'Cantidad') {
                        $codigo_descuento = $request->codigo_descuento;
                        $descuento_cantidad = $getDescuento->porcentaje_cantidad;
                        $total_pagable = $total_pagable - $getDescuento->porcentaje_cantidad;
                    } else {
                        $codigo_descuento = $request->codigo_descuento;
                        $descuento_cantidad = ($total_pagable * $getDescuento->porcentaje_cantidad) / 100;
                        $total_pagable = $total_pagable - $descuento_cantidad;
                    }
                }
            }

            $cantidad_envio = !empty($getEnvio->precio) ? $getEnvio->precio : 0;
            $cantidad_total = $total_pagable - $cantidad_envio;

            $pedido = new PedidosModel;

            if (!empty($user_id)) {
                $pedido->user_id = trim($user_id);
            }

            $pedido->numero_pedido = mt_rand(100000000, 999999999);
            $pedido->nombres = trim($request->nombres);
            $pedido->apellidos = trim($request->apellidos);
            $pedido->nombre_compania = trim($request->nombre_compania);
            $pedido->pais = trim($request->pais);
            $pedido->primera_direccion = trim($request->primera_direccion);
            $pedido->segunda_direccion = trim($request->segunda_direccion);
            $pedido->ciudad = trim($request->ciudad);
            $pedido->distrito = trim($request->distrito);
            $pedido->codigo_postal = trim($request->codigo_postal);
            $pedido->telefono = trim($request->telefono);
            $pedido->email = trim($request->email);
            $pedido->notas = trim($request->notas);
            $pedido->cantidad_descuento = trim($descuento_cantidad);
            $pedido->codigo_descuento = trim($codigo_descuento);
            $pedido->envio_id = trim($request->shipping);
            $pedido->cantidad_envio = trim($cantidad_envio);
            $pedido->cantidad_total = trim($cantidad_total);
            $pedido->metodo_pago = trim($request->metodo_pago);
            $pedido->save();

            foreach (Cart::getContent() as $key => $carrito) {
                $pedido_item = new PedidoItemModel;
                $pedido_item->pedido_id = $pedido->id;
                $pedido_item->producto_id = $carrito->id;
                $pedido_item->cantidad = $carrito->quantity;
                $pedido_item->precio = $carrito->price;

                $color_id = $carrito->attributes->color_id;

                if (!empty($color_id)) {
                    $getColor = ColorModel::getSingle($color_id);
                    $pedido_item->nombre_color = $getColor->nombre;
                }

                $tamano_id = $carrito->attributes->size_id;

                if (!empty($tamano_id)) {
                    $getTamano = ProductoTamanoModel::getSingle($tamano_id);
                    $pedido_item->nombre_tamano = $getTamano->nombre;
                    $pedido_item->cantidad_tamano = $getTamano->precio;
                }

                $pedido_item->precio_total = $carrito->price * $carrito->quantity;
                $pedido_item->save();
            }
            $json['status'] = true;
            $json['message'] =  "success";
            $json['redirect'] =  url('pagar/pago?pedido_id=' . base64_encode($pedido->id));
        } else {
            $json['status'] = false;
            $json['message'] =  $message;
        }

        echo json_encode($json, JSON_UNESCAPED_UNICODE);
    }

    public function verificar_pago(Request $request)
    {
        if (!empty(Cart::getSubTotal()) && !empty($request->pedido_id)) {
            $pedido_id = base64_decode($request->pedido_id);
            $getPedido = PedidosModel::getSingle($pedido_id);

            if (!empty($getPedido)) {
                if ($getPedido->metodo_pago == 'cash') {
                    $getPedido->esta_pagado = 1;
                    $getPedido->save();

                    Mail::to($getPedido->email)->send(new FacturaPedidoMail($getPedido));

                    $user_id = $getPedido->user_id;
                    $url = url('admin/pedidos/detalles/' . $getPedido->id);
                    $mensaje = "Nuevo pedido realizado #" . $getPedido->numero_pedido;
                    NotificacionModel::insertRecord($user_id, $url, $mensaje);

                    Cart::clear();

                    return redirect('carrito')->with('success', 'Pedido reralizado exitosamente!');
                } else if ($getPedido->metodo_pago == 'paypal') {
                    $query = array();
                    $query['business'] = "vipulbusiness1@gmail.com";
                    $query['cmd'] = '_xclick';
                    $query['item_name'] = "E-commerce";
                    $query['no_shipping'] = '1';
                    $query['item_number'] = $getPedido->id;

                    // Convertir el monto de soles a dólares
                    $soles_total = $getPedido->cantidad_total;
                    $tasa_cambio = 3.72;
                    $dolares_total = $soles_total / $tasa_cambio;

                    $query['amount'] = $dolares_total;
                    $query['cuerrency_code'] = 'USD';
                    $query['cancel_return'] = url('pagar');
                    $query['return'] = url('paypal/success-payment');

                    $query_string = http_build_query($query);

                    header('Location: https://www.sandbox.paypal.com/cgi-bin/webscr?' . $query_string);

                    //header('Location: https://www.paypal.com/cgi-bin/webscr?' . $query_string);
                    exit();
                } else if ($getPedido->metodo_pago == 'stripe') {
                    Stripe::setApiKey(env('STRIPE_SECRET'));

                    // Convertir el monto de soles a dólares
                    $soles_total = $getPedido->cantidad_total;
                    $tasa_cambio = 3.72;
                    $dolares_total = $soles_total / $tasa_cambio;

                    $finalPrice = $dolares_total * 100;

                    $session = \Stripe\Checkout\Session::create([
                        'customer_email' => $getPedido->email,
                        'payment_method_types' => ['card'],
                        'line_items' => [[
                            'price_data' => [
                                'currency' => 'usd',
                                'product_data' => [
                                    'name' => 'E-commerce'
                                ],
                                'unit_amount' => intval($finalPrice),
                            ],
                            'quantity' => 1,
                        ]],
                        'mode' => 'payment',
                        'success_url' => url('stripe/payment-success'),
                        'cancel_url' => url('pagar'),
                    ]);

                    $getPedido->stripe_session_id = $session['id'];
                    $getPedido->save();

                    $data['session_id'] = $session['id'];
                    Session::put('stripe_session_id', $session['id']);
                    $data['setPublicKey'] = env('STRIPE_KEY');

                    return view('pagos.stripe_charge', $data);
                }
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }
    }

    public function paypal_success_payment(Request $request)
    {
        if (!empty($request->item_number) && !empty($request->st) && $request->st == 'Completed') {
            $getPedido = PedidosModel::getSingle($request->item_number);
            if (!empty($getPedido)) {
                $getPedido->esta_pagado = 1;
                $getPedido->transaccion_id = $request->tx;
                $getPedido->pago_data = json_encode($request->all());
                $getPedido->save();

                Mail::to($getPedido->email)->send(new FacturaPedidoMail($getPedido));

                $user_id = $getPedido->user_id;
                $url = url('admin/pedidos/detalles/' . $getPedido->id);
                $mensaje = "Nuevo pedido realizado #" . $getPedido->numero_pedido;
                NotificacionModel::insertRecord($user_id, $url, $mensaje);

                Cart::clear();

                return redirect('carrito')->with('success', 'Pedido reralizado exitosamente!');
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }
    }

    public function stripe_success_payment(Request $request)
    {
        $trans_id = Session::get('stripe_session_id');
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $getdata = \Stripe\Checkout\Session::retrieve($trans_id);

        $getPedido = PedidosModel::where('stripe_session_id', '=', $getdata->id)->first();

        if (!empty($getPedido) && !empty($getdata->id) && $getdata->id == $getPedido->stripe_session_id) {
            $getPedido->esta_pagado = 1;
            $getPedido->transaccion_id = $getdata->id;
            $getPedido->pago_data = json_encode($getdata);
            $getPedido->save();

            Mail::to($getPedido->email)->send(new FacturaPedidoMail($getPedido));

            $user_id = $getPedido->user_id;
            $url = url('admin/pedidos/detalles/' . $getPedido->id);
            $mensaje = "Nuevo pedido realizado #" . $getPedido->numero_pedido;
            NotificacionModel::insertRecord($user_id, $url, $mensaje);

            Cart::clear();

            return redirect('carrito')->with('success', 'Pedido reralizado exitosamente!');
        } else {
            return redirect('carrito')->with('error', 'Hubo un error por favor intenta nuevamente');
        }
    }
}
