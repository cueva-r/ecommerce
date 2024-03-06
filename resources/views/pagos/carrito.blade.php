@extends('layouts.app')

@section('style')
    <style>
        .xd {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            /* Esto centra verticalmente en la ventana */
        }

        .xd2 {
            margin-top: -200px;
        }

        .xd3 {
            max-width: 40%;
            /* Cambia este valor para ajustar el tamaño de la imagen */
            height: auto;
        }
    </style>
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Carrito de compras<span>Carrito</span></h1>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="#">Tienda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Carrito de compras</li>
                </ol>
            </div>
        </nav>

        <div class="page-content">
            <div class="cart">
                <div class="container">
                    @if (!empty(Cart::getContent()->count()))
                        <div class="row">
                            <div class="col-lg-9">
                                <form action="{{ url('actualizar_carrito') }}" method="POST">
                                    {{ csrf_field() }}
                                    <table class="table table-cart table-mobile">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Precio</th>
                                                <th>Cantidad</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach (Cart::getContent() as $key => $carrito)
                                                @php
                                                    $getCarritoProducto = App\Models\ProductoModel::getSingle(
                                                        $carrito->id,
                                                    );
                                                @endphp

                                                @if (!empty($getCarritoProducto))
                                                    @php
                                                        $getProductoImagen = $getCarritoProducto->getImagenSingle(
                                                            $getCarritoProducto->id,
                                                        );
                                                    @endphp

                                                    <tr>
                                                        <td class="product-col">
                                                            <div class="product">
                                                                <figure class="product-media">
                                                                    <a href="{{ url($getCarritoProducto->slug) }}">
                                                                        <img src="{{ $getProductoImagen->getLogo() }}"
                                                                            alt="Product image">
                                                                    </a>
                                                                </figure>

                                                                <h3 class="product-title">
                                                                    <a
                                                                        href="{{ url($getCarritoProducto->slug) }}">{{ $getCarritoProducto->titulo }}</a>
                                                                </h3>
                                                            </div>
                                                        </td>
                                                        <td class="price-col">S/. {{ number_format($carrito->price, 2) }}
                                                        </td>
                                                        <td class="quantity-col">
                                                            <div class="cart-product-quantity">
                                                                <input type="number" class="form-control"
                                                                    value="{{ $carrito->quantity }}" min="1"
                                                                    name="carrito[{{ $key }}][qty]" max="100"
                                                                    step="1" data-decimals="0" required>
                                                            </div>

                                                            <input type="hidden" value="{{ $carrito->id }}"
                                                                name="carrito[{{ $key }}][id]">
                                                        </td>
                                                        <td class="total-col">
                                                            S/.{{ number_format($carrito->price * $carrito->quantity, 2) }}
                                                        </td>
                                                        <td class="remove-col"><a
                                                                href="{{ url('carrito/eliminar/' . $carrito->id) }}"
                                                                class="btn-remove"><i class="icon-close"></i></a></td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <div class="cart-bottom">
                                        <button type="submit" class="btn btn-outline-dark-2"><span>ACTUALIZAR
                                                CARRITO</span><i class="icon-refresh"></i></a>
                                    </div>
                                </form>
                            </div>
                            <aside class="col-lg-3">
                                <div class="summary summary-cart">
                                    <h3 class="summary-title">Total del carrito</h3>

                                    <table class="table table-summary">
                                        <tbody>
                                            <tr class="summary-subtotal">
                                                <td>Subtotal:</td>
                                                <td>S/.{{ number_format(Cart::getSubtotal(), 2) }}</td>
                                            </tr>

                                            <tr class="summary-total">
                                                <td>Total:</td>
                                                <td>S/.{{ number_format(Cart::getSubtotal(), 2) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <a href="{{ url('pagar') }}" class="btn btn-outline-primary-2 btn-order btn-block">IR
                                        A PAGAR</a>
                                </div>

                                <a href="{{ url('') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUAR
                                        COMPRANDO</span><i class="icon-refresh"></i></a>
                            </aside>
                        </div>
                    @else
                        <div class="xd">
                            <p class="text-center xd2">No hay productos en el carrito</p>
                            <img class="xd3" src="assets/images/no-data.jpg" alt="no data" />
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
@endsection
