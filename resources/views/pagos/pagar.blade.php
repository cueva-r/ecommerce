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
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="checkout-title">Detalles de facturación</h2>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Nombres *</label>
                                        <input type="text" class="form-control" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Apellidos *</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                </div>

                                <label>Nombre de compañía (Opcional)</label>
                                <input type="text" class="form-control">

                                <label>País *</label>
                                <input type="text" class="form-control" required>

                                <label>Dirección *</label>
                                <input type="text" class="form-control" placeholder="Número de casa y nombre de la calle"
                                    required>
                                <input type="text" class="form-control" placeholder="Apartamentos, suite, unidad etc..."
                                    required>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Distrito / Provincia *</label>
                                        <input type="text" class="form-control" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Ciudad / País *</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Código postal *</label>
                                        <input type="text" class="form-control" required>
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Teléfono *</label>
                                        <input type="tel" class="form-control" required>
                                    </div>
                                </div>

                                <label>Correo electrónico *</label>
                                <input type="email" class="form-control" required>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkout-create-acc">
                                    <label class="custom-control-label" for="checkout-create-acc">¿Crea una cuenta?</label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkout-diff-address">
                                    <label class="custom-control-label" for="checkout-diff-address">¿Envia a una direccion
                                        diferente?</label>
                                </div>

                                <label>Notas de pedido (opcional)</label>
                                <textarea class="form-control" cols="30" rows="4"
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
                                                            <input type="text" class="form-control" required
                                                                placeholder="Código de cupón">
                                                            <div class="input-group-append">
                                                                <button style="height: 38px" type="button" class="btn btn-outline-primary-2"
                                                                    type="submit"><i
                                                                        class="icon-long-arrow-right"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Descuento:</td>
                                                <td>S/. 0.00</td>
                                            </tr>
                                            <tr>
                                                <td>Envíos:</td>
                                                <td>Envíos gratis</td>
                                            </tr>
                                            <tr class="summary-total">
                                                <td>Total:</td>
                                                <td>S/.{{ number_format(Cart::getSubtotal(), 2) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="accordion-summary" id="accordion-payment">
                                        <div class="card">
                                            <div class="card-header" id="heading-3">
                                                <h2 class="card-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        href="#collapse-3" aria-expanded="false"
                                                        aria-controls="collapse-3">
                                                        Contra reembolso
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-3" class="collapse" aria-labelledby="heading-3"
                                                data-parent="#accordion-payment">
                                                <div class="card-body">Quisque volutpat mattis eros. Lorem ipsum dolor sit
                                                    amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis
                                                    eros.
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->

                                        <div class="card">
                                            <div class="card-header" id="heading-4">
                                                <h2 class="card-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        href="#collapse-4" aria-expanded="false"
                                                        aria-controls="collapse-4">
                                                        PayPal <small class="float-right paypal-link">Qué es
                                                            paypal?</small>
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-4" class="collapse" aria-labelledby="heading-4"
                                                data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non,
                                                    semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis
                                                    fermentum.
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->

                                        <div class="card">
                                            <div class="card-header" id="heading-5">
                                                <h2 class="card-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        href="#collapse-5" aria-expanded="false"
                                                        aria-controls="collapse-5">
                                                        Tarjeta de crédito
                                                        <img src="assets/images/payments-summary.png"
                                                            alt="payments cards">
                                                    </a>
                                                </h2>
                                            </div><!-- End .card-header -->
                                            <div id="collapse-5" class="collapse" aria-labelledby="heading-5"
                                                data-parent="#accordion-payment">
                                                <div class="card-body"> Donec nec justo eget felis facilisis
                                                    fermentum.Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                                    Donec odio. Quisque volutpat mattis eros. Lorem ipsum dolor sit ame.
                                                </div><!-- End .card-body -->
                                            </div><!-- End .collapse -->
                                        </div><!-- End .card -->
                                    </div>

                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                        <span class="btn-text">Procesar orden</span>
                                        <span class="btn-hover-text">Pasar por la caja</span>
                                    </button>
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
@endsection
