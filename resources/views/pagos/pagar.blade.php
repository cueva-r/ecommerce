@extends('layouts.app')

@section('style')
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Pagar<span>Pagar</span></h1>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="#">Tienda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pagar</li>
                </ol>
            </div>
        </nav>

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <form action="" id="enviarFormulario" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="checkout-title">Detalles de facturación</h2>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Nombres <span style="color: red">*</span></label>
                                        <input type="text" name="nombres" class="form-control" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Apellidos <span style="color: red">*</span></label>
                                        <input type="text" name="apellidos" class="form-control" required>
                                    </div>
                                </div>

                                <label>Nombre de compañía (Opcional)</label>
                                <input type="text" name="nombre_compania" class="form-control">

                                <label>País <span style="color: red">*</span></label>
                                <input type="text" name="pais" class="form-control" required>

                                <label>Dirección <span style="color: red">*</span></label>
                                <input type="text" class="form-control" name="primera_direccion"
                                    placeholder="Número de casa y nombre de la calle" required>
                                <input type="text" class="form-control" name="segunda_direccion"
                                    placeholder="Apartamentos, suite, unidad etc..." required>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Ciudad / Provincia <span style="color: red">*</span></label>
                                        <input type="text" name="ciudad" class="form-control" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Distrito <span style="color: red">*</span></label>
                                        <input type="text" name="distrito" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Código postal <span style="color: red">*</span></label>
                                        <input type="text" name="codigo_postal" class="form-control" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Teléfono <span style="color: red">*</span></label>
                                        <input type="tel" name="telefono" class="form-control" required>
                                    </div>
                                </div>

                                <label>Correo electrónico <span style="color: red">*</span></label>
                                <input type="email" name="email" class="form-control" required>

                                @if (empty(Auth::check()))
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="esta_creado" class="custom-control-input crearCuenta"
                                            id="checkout-create-acc">
                                        <label class="custom-control-label" for="checkout-create-acc">Crea una
                                            cuenta</label>
                                    </div>

                                    <div id="mostrarContrasena" style="display: none;">
                                        <label>Contraseña <span style="color: red">*</span></label>
                                        <input type="password" id="inputContrasena" name="password" class="form-control">
                                    </div>
                                @endif

                                <label>Notas de pedido (opcional)</label>
                                <textarea class="form-control" cols="30" name="notas" rows="4"
                                    placeholder="Notas sobre su pedido, p.e. notas especiales para la entrega"></textarea>
                            </div>
                            <aside class="col-lg-3">
                                <div class="summary">
                                    <h3 class="summary-title">Tu orden</h3>

                                    <table class="table table-summary">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach (Cart::getContent() as $key => $carrito)
                                                @php
                                                    $getCarritoProducto = App\Models\ProductoModel::getSingle(
                                                        $carrito->id,
                                                    );
                                                @endphp
                                                <tr>
                                                    <td><a
                                                            href="{{ url($getCarritoProducto->slug) }}">{{ $getCarritoProducto->titulo }}</a>
                                                    </td>
                                                    <td>S/.{{ number_format($carrito->price * $carrito->quantity, 2) }}</td>
                                                </tr>
                                            @endforeach
                                            <tr class="summary-subtotal">
                                                <td>Subtotal:</td>
                                                <td>S/.{{ number_format(Cart::getSubtotal(), 2) }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <div class="cart-discount">
                                                        <div class="input-group">
                                                            <input type="text" id="getCodigoDescuento"
                                                                name="codigo_descuento" class="form-control"
                                                                placeholder="Código de descuento">
                                                            <div class="input-group-append">
                                                                <button style="height: 38px" id="aplicarDescuento"
                                                                    type="button" class="btn btn-outline-primary-2"><i
                                                                        class="icon-long-arrow-right"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Descuento:</td>
                                                <td>S/. <span id="getDescuentoCantidad">0.00</span></td>
                                            </tr>
                                            <tr class="summary-shipping">
                                                <td>Envíos</td>
                                                <td>&nbsp;</td>
                                            </tr>

                                            @foreach ($getEnvio as $envio)
                                                <tr class="summary-shipping-row">
                                                    <td>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" value="{{ $envio->id }}"
                                                                id="free-shipping{{ $envio->id }}" name="shipping"
                                                                required class="custom-control-input getCostoEnvio"
                                                                data-price="{{ !empty($envio->precio) ? $envio->precio : 0 }}">
                                                            <label class="custom-control-label"
                                                                for="free-shipping{{ $envio->id }}">{{ $envio->nombre }}</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if (!empty($envio->precio))
                                                            S/. {{ number_format($envio->precio, 2) }}
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach

                                            <tr class="summary-total">
                                                <td>
                                                    Total:
                                                </td>
                                                <td>S/. <span
                                                        id="getTotalPagable">{{ number_format(Cart::getSubtotal(), 2) }}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <input type="hidden" id="getCostoEnvioTotalPagable" value="0">
                                    <input type="hidden" id="totalPagable" value="{{ Cart::getSubtotal() }}">

                                    <div class="accordion-summary" id="accordion-payment">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" value="cash" id="contra_reembolso"
                                                name="metodo_pago" required class="custom-control-input">
                                            <label class="custom-control-label" for="contra_reembolso">Pagar con efectivo</label>
                                        </div>

                                        {{-- <div class="custom-control custom-radio" style="margin-top: 0px;">
                                            <input type="radio" value="paypal" id="paypal" name="metodo_pago"
                                                required class="custom-control-input">
                                            <label class="custom-control-label" for="paypal">Paypal</label>
                                        </div> --}}

                                        <div class="custom-control custom-radio" style="margin-top: 0px;">
                                            <input type="radio" value="stripe" id="tarjeta_credito_debito"
                                                name="metodo_pago" required class="custom-control-input">
                                            <label class="custom-control-label" for="tarjeta_credito_debito">Tarjeta de
                                                crédito o
                                                débito</label>

                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                        <span class="btn-text">Procesar orden</span>
                                        <span class="btn-hover-text">Pagar el pedido</span>
                                    </button>
                                    <br>
                                    <br>
                                    <img src="{{ url('assets/images/payments-summary.png') }}" alt="payments cards">
                                </div>
                            </aside>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        $('body').delegate('.crearCuenta', 'change', function() {
            if (this.checked) {
                $('#mostrarContrasena').show()
                $('#inputContrasena').prop('required', true)
            } else {
                $('#mostrarContrasena').hide()
                $('#inputContrasena').prop('required', false)
            }
        })

        $('body').delegate('#enviarFormulario', 'submit', function(e) {
            e.preventDefault()
            $.ajax({
                type: "POST",
                url: "{{ url('pagar/realizar_pedido') }}",
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(data) {
                    if (data.status == false) {
                        alert(data.message)
                    }else{
                        window.location.href = data.redirect
                    }
                },
                error: function(data) {}
            })
        })

        $('body').delegate('.getCostoEnvio', 'change', function() {
            var precio = $(this).attr('data-price')
            var total = $('#totalPagable').val()
            $('#getCostoEnvioTotalPagable').val(precio)
            var total_final = parseFloat(precio) + parseFloat(total)
            $('#getTotalPagable').html(total_final.toFixed(2))
        })

        $('body').delegate('#aplicarDescuento', 'click', function() {
            var codigo_descuento = $('#getCodigoDescuento').val();

            $.ajax({
                type: "POST",
                url: "{{ url('pagar/aplicar_codigo_descuento') }}",
                data: {
                    codigo_descuento: codigo_descuento,
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(data) {
                    $('#getDescuentoCantidad').html(data.descuento_cantidad)

                    var envio = $('#getCostoEnvioTotalPagable').val()
                    var total_final = parseFloat(envio) + parseFloat(data.total_pagable)

                    $('#getTotalPagable').html(total_final.toFixed(2))
                    $('#totalPagable').val(data.total_pagable)

                    if (data.status == false) {
                        alert(data.message)
                    }
                },
                error: function(data) {}
            });
        });
    </script>
@endsection
