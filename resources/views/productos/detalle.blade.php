@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ url('assets/css/plugins/nouislider/nouislider.css') }}">

    <style>
        .btn-product.btn-cart {
            background: #fff;
            color: #c96;
            border: 1px solid #c96;
            /* Borde inicial */
            transition: background 0.3s, border-color 0.3s, color 0.3s;
            /* Agregamos una transición suave */
        }

        .btn-product.btn-cart:hover {
            background: #c96 !important;
            border-color: #c96 !important;
            /* Cambiamos el color del borde al color deseado */
            color: #fff !important;
            /* Cambiamos el color del texto a blanco */
        }
    </style>
@endsection

@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a
                            href="{{ url($getProducto->getCategoria->slug) }}">{{ $getProducto->getCategoria->nombre }}</a>
                    </li>
                    <li class="breadcrumb-item"><a
                            href="{{ url($getProducto->getCategoria->slug . '/' . $getProducto->getSubCategoria->slug) }}">{{ $getProducto->getSubCategoria->nombre }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $getProducto->titulo }}</li>
                </ol>
            </div>
        </nav>

        <div class="page-content">
            <div class="container">
                <div class="product-details-top mb-2">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-gallery">
                                <figure class="product-main-image">
                                    @php
                                        $getProductoImagen = $getProducto->getImagenSingle($getProducto->id);
                                    @endphp

                                    @if (!empty($getProductoImagen) && !empty($getProductoImagen->getLogo()))
                                        <img id="product-zoom" src="{{ $getProductoImagen->getLogo() }}"
                                            data-zoom-image="{{ $getProductoImagen->getLogo() }}" alt="product image">

                                        <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                            <i class="icon-arrows"></i>
                                        </a>
                                    @endif
                                </figure>

                                <div id="product-zoom-gallery" class="product-image-gallery">
                                    @foreach ($getProducto->getImagen as $imagen)
                                        <a class="product-gallery-item" href="#" data-image="{{ $imagen->getLogo() }}"
                                            data-zoom-image="{{ $imagen->getLogo() }}">
                                            <img src="{{ $imagen->getLogo() }}" alt="product side">
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="product-details">
                                <h1 class="product-title">{{ $getProducto->titulo }}</h1>

                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 80%;"></div>
                                    </div>
                                    <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reseñas )</a>
                                </div>

                                <div class="product-price mb-4">
                                    S/. <span id="getTotalPrecio">{{ number_format($getProducto->precio, 2) }}</span>
                                </div>

                                <div class="product-content">
                                    <p>{!! $getProducto->descripcion_corta !!}</p>
                                </div>

                                <form action="{{ url('producto/agregar-al-carrito') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="producto_id" value="{{ $getProducto->id }}">
                                    @if (!empty($getProducto->getColor->count()))
                                        <div class="details-filter-row details-row-size">
                                            <label for="size">Color:</label>
                                            <div class="select-custom">
                                                <select name="color_id" id="color_id" class="form-control" required>
                                                    <option value="">Selecciona un color</option>
                                                    @foreach ($getProducto->getColor as $color)
                                                        <option value="{{ $color->getColor->id }}">
                                                            {{ $color->getColor->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif

                                    @if (!empty($getProducto->getTamano->count()))
                                        <div class="details-filter-row details-row-size">
                                            <label for="size">Tanaño:</label>
                                            <div class="select-custom">
                                                <select name="size_id" id="size" required
                                                    class="form-control getTamanoPrecio">
                                                    <option data-price="0" value="">Selecciona un tamaño</option>
                                                    @foreach ($getProducto->getTamano as $tamano)
                                                        <option
                                                            data-price="{{ !empty($tamano->precio) ? $tamano->precio : 0 }}"
                                                            value="{{ $tamano->id }}">{{ $tamano->nombre }} @if (!empty($tamano->precio))
                                                                (s/. {{ number_format($tamano->precio, 2) }})
                                                            @endif
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="details-filter-row details-row-size">
                                        <label for="qty">Cantidad:</label>
                                        <div class="product-details-quantity">
                                            <input type="number" id="qty" class="form-control" value="1"
                                                min="1" max="100" name="qty" required step="1"
                                                data-decimals="0" required>
                                        </div>
                                    </div>

                                    <div class="product-details-action">
                                        <button style="background: #fff; color: #c96;" type="submit"
                                            class="btn-product btn-cart"><span>Añadir al carrito</span></button>

                                        <div class="details-action-wrapper">
                                            @if (!empty(Auth::check()))
                                                <a href="javascript:;"
                                                    class="agregar_a_la_lista_de_deseos btn-agregar-listadeseos{{ $getProducto->id }} btn-product btn-wishlist {{ !empty($getProducto->revisarListaDeDeseos($getProducto->id)) ? 'btn-agregar-listadeseos' : '' }}"
                                                    title="Wishlist" id="{{ $getProducto->id }}">
                                                    <span>Añadir a la lista de deseos</span>
                                                </a>
                                            @else
                                                <a href="#signin-modal" class="btn-product btn-wishlist" data-toggle="modal"
                                                    title="Wishlist">
                                                    <span>Añadir a la lista de deseos</span>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>

                                <div class="product-details-footer">
                                    <div class="product-cat">
                                        <span>Categoría:</span>
                                        <a
                                            href="{{ url($getProducto->getCategoria->slug) }}">{{ $getProducto->getCategoria->nombre }}</a>,
                                        <a
                                            href="{{ url($getProducto->getCategoria->slug . '/' . $getProducto->getSubCategoria->slug) }}">{{ $getProducto->getSubCategoria->nombre }}</a>
                                    </div>

                                    {{-- <div class="social-icons social-icons-sm">
                                        <span class="social-label">Compartir:</span>
                                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                                                class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i
                                                class="icon-twitter"></i></a>
                                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i
                                                class="icon-instagram"></i></a>
                                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i
                                                class="icon-pinterest"></i></a>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="product-details-tab product-details-extended">
                <div class="container">
                    <ul class="nav nav-pills justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab"
                                role="tab" aria-controls="product-desc-tab" aria-selected="true">Descripción</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab"
                                role="tab" aria-controls="product-info-tab" aria-selected="false">Información
                                adicional</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-shipping-link" data-toggle="tab"
                                href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab"
                                aria-selected="false">Envíos & devoluciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab"
                                role="tab" aria-controls="product-review-tab" aria-selected="false">Reseñas (2)</a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                        aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            <div class="container" style="margin-top: 30px">
                                {!! $getProducto->descripcion !!}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="product-info-tab" role="tabpanel"
                        aria-labelledby="product-info-link">
                        <div class="product-desc-content">
                            <div class="container" style="margin-top: 30px">
                                {!! $getProducto->informacion_adicional !!}
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel"
                        aria-labelledby="product-shipping-link">
                        <div class="product-desc-content">
                            <div class="container" style="margin-top: 30px">
                                {!! $getProducto->envios_devoluciones !!}
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="product-review-tab" role="tabpanel"
                        aria-labelledby="product-review-link">
                        <div class="reviews">
                            <div class="container" style="margin-top: 30px">
                                <h3>Reseñas (2)</h3>
                                <div class="review">
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <h4><a href="#">Samanta J.</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 80%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                            </div><!-- End .rating-container -->
                                            <span class="review-date">6 days ago</span>
                                        </div><!-- End .col -->
                                        <div class="col">
                                            <h4>Good, perfect size</h4>

                                            <div class="review-content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus cum
                                                    dolores assumenda asperiores facilis porro reprehenderit animi culpa
                                                    atque blanditiis commodi perspiciatis doloremque, possimus, explicabo,
                                                    autem fugit beatae quae voluptas!</p>
                                            </div><!-- End .review-content -->

                                            <div class="review-action">
                                                <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                                <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                            </div><!-- End .review-action -->
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .row -->
                                </div><!-- End .review -->

                                <div class="review">
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <h4><a href="#">John Doe</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 100%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                            </div><!-- End .rating-container -->
                                            <span class="review-date">5 days ago</span>
                                        </div><!-- End .col -->
                                        <div class="col">
                                            <h4>Very good</h4>

                                            <div class="review-content">
                                                <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum blanditiis
                                                    laudantium iste amet. Cum non voluptate eos enim, ab cumque nam, modi,
                                                    quas iure illum repellendus, blanditiis perspiciatis beatae!</p>
                                            </div>

                                            <div class="review-action">
                                                <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                                <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <h2 class="title text-center mb-4">Productos relacionados</h2>
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1200": {
                            "items":4,
                            "nav": true,
                            "dots": false
                        }
                    }
                }'>

                    @foreach ($getRelatedProducto as $valor)
                        @php
                            $getProductoImagen = $valor->getImagenSingle($valor->id);
                        @endphp
                        <div class="product product-7">
                            <figure class="product-media">
                                <a href="{{ url($valor->slug) }}">
                                    @if (!empty($getProductoImagen) && !empty($getProductoImagen->getLogo()))
                                        <img style="height: 280px; width: 100%; object-fit: cover"
                                            src="{{ $getProductoImagen->getLogo() }}" alt="{{ $valor->titulo }}"
                                            class="product-image">
                                    @endif
                                </a>

                                <div class="product-action-vertical">
                                    @if (!empty(Auth::check()))
                                        {{-- <a href="javascript:;"
                                            class="agregar_a_la_lista_de_deseos btn-agregar-listadeseos{{ $getProducto->id }} btn-product btn-wishlist {{ !empty($getProducto->revisarListaDeDeseos($getProducto->id)) ? 'btn-agregar-listadeseos' : '' }}"
                                            title="Wishlist" id="{{ $getProducto->id }}">
                                            <span>Añadir a la lista de deseos</span>
                                        </a> --}}

                                        <a href="javascript:;" class="agregar_a_la_lista_de_deseos btn-agregar-listadeseos{{ $valor->id }} btn-product-icon btn-wishlist btn-expandable {{ !empty($valor->revisarListaDeDeseos($valor->id)) ? 'btn-agregar-listadeseos' : '' }}"
                                            title="Wishlist" id="{{ $valor->id }}">
                                            <span>Añadir a la lista de deseos</span>
                                        </a>
                                    @else
                                        <a href="#signin-modal" class="btn-product-icon btn-wishlist btn-expandable" data-toggle="modal"
                                            title="Wishlist">
                                            <span>Añadir a la lista de deseos</span>
                                        </a>
                                    @endif

                                    {{-- <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>Agregar a
                                            la lista de deseos</span></a> --}}
                                </div>
                            </figure>

                            <div class="product-body">
                                <div class="product-cat">
                                    <a
                                        href="{{ url($valor->categoria_slug . '/' . $valor->subcategoria_slug) }}">{{ $valor->subcategoria_nombre }}</a>
                                </div>
                                <h3 class="product-title">
                                    <a href="{{ $valor->slug }}">{{ $valor->titulo }}</a>
                                </h3>
                                <div class="product-price">
                                    S/. {{ number_format($valor->precio, 2) }}
                                </div>
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 20%;"></div>
                                    </div>
                                    <span class="ratings-text">( 2 Reseñas )</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script src="{{ url('assets/js/bootstrap-input-spinner.js') }}"></script>
    <script src="{{ url('assets/js/jquery.elevateZoom.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap-input-spinner.js') }}"></script>

    <script>
        $('.getTamanoPrecio').change(function() {
            var precioProducto = '{{ $getProducto->precio }}'
            var precio = $('option:selected', this).attr('data-price')
            var total = parseFloat(precioProducto) + parseFloat(precio)
            $('#getTotalPrecio').html(total.toFixed(2))
        })
    </script>
@endsection
