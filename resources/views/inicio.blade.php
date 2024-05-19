@extends('layouts.app')

@section('content')
    <style>
        .owl-carousel.owl-simple {
            text-align: center;
        }

        .owl-carousel.owl-simple .owl-item {
            display: inline-block;
            float: none;
            vertical-align: middle;
        }
    </style>
    <main class="main">
        <div class="intro-section bg-lighter pt-5 pb-6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="intro-slider-container slider-container-ratio slider-container-1 mb-2 mb-lg-0">
                            <div class="intro-slider intro-slider-1 owl-carousel owl-simple owl-light owl-nav-inside"
                                data-toggle="owl"
                                data-owl-options='{
                                        "nav": false, 
                                        "responsive": {
                                            "768": {
                                                "nav": true
                                            }
                                        }
                                    }'>

                                @foreach ($getSliders as $slider)
                                    @if (!empty($slider->getImagen()))
                                        <div class="intro-slide">
                                            <figure class="slide-image">
                                                <picture>
                                                    <source media="(max-width: 480px)" srcset="{{ $slider->getImagen() }}">
                                                    <img src="{{ $slider->getImagen() }}" alt="{{ $slider->titulo }}">
                                                </picture>
                                            </figure>

                                            <div class="intro-content">
                                                <h1 class="intro-title">{!! $slider->titulo !!}</h1>
                                                @if (!empty($slider->link_button) && !empty($slider->nombre_button))
                                                    <a href="{{ $slider->link_button }}" class="btn btn-outline-white">
                                                        <span>{{ $slider->nombre_button }}</span>
                                                        <i class="icon-long-arrow-right"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <span class="slider-loader"></span>
                        </div>
                    </div>
                </div>

                <hr>

                @if (!empty($getSocios->count()))
                    <div class="mb-6 d-flex justify-content-center">
                        <div class="owl-carousel owl-simple" data-toggle="owl"
                            data-owl-options='{
                        "nav": false, 
                        "dots": false,
                        "margin": 30,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "420": {
                                "items":3
                            },
                            "600": {
                                "items":4
                            },
                            "900": {
                                "items":5
                            },
                            "1024": {
                                "items":6
                            }
                        }
                    }'>
                            @foreach ($getSocios as $socios)
                                @if (!empty($socios->getImagen()))
                                    <a href="{{ !empty($socios->link_button) ? $socios->link_button : '#' }}"
                                        class="brand">
                                        <img src="{{ $socios->getImagen() }}" style="max-width: 100%; height: auto;">
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="mb-6"></div>

        @if (!empty($getProductoTendencia->count()))
            <div class="container">
                <div class="heading heading-center mb-3">
                    <h2 class="title-lg">Productos en tedencia</h2>
                </div>

                <div class="tab-content tab-content-carousel">
                    <div class="tab-pane p-0 fade show active" id="trendy-all-tab" role="tabpanel"
                        aria-labelledby="trendy-all-link">
                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                            data-owl-options='{
                                    "nav": false, 
                                    "dots": true,
                                    "margin": 20,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":2
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
                            @foreach ($getProductoTendencia as $valor)
                                @php
                                    $getProductoImagen = $valor->getImagenSingle($valor->id);
                                @endphp
                                <div class="product product-7 text-center">
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
                                                <a href="javascript:;"
                                                    class="agregar_a_la_lista_de_deseos btn-agregar-listadeseos{{ $valor->id }} btn-product-icon btn-wishlist btn-expandable {{ !empty($valor->revisarListaDeDeseos($valor->id)) ? 'btn-agregar-listadeseos' : '' }}"
                                                    title="Wishlist" id="{{ $valor->id }}">
                                                    <span>Añadir a la lista de deseos</span>
                                                </a>
                                            @else
                                                <a href="#signin-modal" class="btn-product-icon btn-wishlist btn-expandable"
                                                    data-toggle="modal" title="Wishlist">
                                                    <span>Añadir a la lista de deseos</span>
                                                </a>
                                            @endif
                                        </div>
                                    </figure>

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a
                                                href="{{ url($valor->categoria_slug . '/' . $valor->subcategoria_slug) }}">{{ $valor->subcategoria_nombre }}</a>
                                        </div>
                                        <h3 class="product-title"><a
                                                href="{{ url($valor->slug) }}">{{ $valor->titulo }}</a></h3>
                                        <div class="product-price">
                                            S/. {{ number_format($valor->precio, 2) }}
                                        </div>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val"
                                                    style="width: {{ $valor->getReviewRating($valor->id) }}%;">
                                                </div>
                                            </div>
                                            <span class="ratings-text">( {{ $valor->getTotalCalificaciones() }} Reseñas
                                                )</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (!empty($getCategorias->count()))
            <div class="container categories pt-6">
                <h2 class="title-lg text-center mb-4">Comprar por categorías</h2>

                <div class="row">
                    @foreach ($getCategorias as $categorias)
                        @if (!empty($categorias->getImagen()))
                            <div class="col-sm-12 col-lg-4 banners-sm">
                                <div class="banner banner-display banner-link-anim col-lg-12 col-6">
                                    <a href="{{ url($categorias->slug) }}">
                                        <img src="{{ $categorias->getImagen() }}"
                                            style="height: 200px; width: 100%; object-fit: cover;"
                                            alt="{{ $categorias->nombre }}">
                                    </a>
                                    <div class="banner-content banner-content-center">
                                        <h3 class="banner-title text-white">
                                            <a href="{{ url($categorias->slug) }}">{{ $categorias->nombre }}</a>
                                        </h3>
                                        @if (!empty($categorias->nombre_button))
                                            <a href="{{ url($categorias->slug) }}"
                                                class="btn btn-outline-white banner-link">
                                                {{ $categorias->nombre_button }}
                                                <i class="icon-long-arrow-right"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="mb-5"></div>
        @endif

        <div class="container">
            <div class="heading heading-center mb-6">
                <h2 class="title">Recién agregados</h2>

                <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="top-all-link" data-toggle="tab" href="#top-all-tab" role="tab"
                            aria-controls="top-all-tab" aria-selected="true">Todos</a>
                    </li>
                    @foreach ($getCategorias as $categorias)
                        <li class="nav-item">
                            <a class="nav-link getCategoriaProducto" data-val="{{ $categorias->id }}"
                                id="top-{{ $categorias->slug }}-link" data-toggle="tab"
                                href="#top-{{ $categorias->slug }}-tab" role="tab"
                                aria-controls="top-{{ $categorias->slug }}-tab"
                                aria-selected="false">{{ $categorias->nombre }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane p-0 fade show active" id="top-all-tab" role="tabpanel"
                    aria-labelledby="top-all-link">
                    <div class="products">
                        @php
                            $esta_inicio = 1;
                        @endphp
                        @include('productos._listar')
                    </div>
                    <div class="more-container text-center">
                        <a href="{{ url('buscar') }}" class="btn btn-outline-darker btn-more">
                            <span>Ver más productos</span>
                            <i class="icon-long-arrow-down"></i>
                        </a>
                    </div>
                </div>
                @foreach ($getCategorias as $categorias)
                    <div class="tab-pane p-0 fade getCategoriaProducto{{ $categorias->id }}"
                        id="top-{{ $categorias->slug }}-tab" role="tabpanel"
                        aria-labelledby="top-{{ $categorias->slug }}-link">

                    </div>
                @endforeach
            </div>

        </div>

        <div class="container">
            <hr>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-card text-center">
                        <span class="icon-box-icon">
                            <i class="icon-rocket"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Pago y entrega</h3>
                            <p>Envío gratis para pedidos superiores a s/. 200.00</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-card text-center">
                        <span class="icon-box-icon">
                            <i class="icon-rotate-left"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Reembolso de vuelta</h3>
                            <p>Garantía de devolución de dinero 100% gratis</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="icon-box icon-box-card text-center">
                        <span class="icon-box-icon">
                            <i class="icon-life-ring"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Soporte de calidad</h3>
                            <p>Siempre retroalimentación en línea 24/7</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-2"></div>
        </div>

        @if (!empty($getBlog->count()))
            <div class="blog-posts pt-7 pb-7" style="background-color: #fafafa;">
                <div class="container">
                    <h2 class="title-lg text-center mb-3 mb-md-4">De nuestro blog</h2>

                    <div class="owl-carousel owl-simple carousel-with-shadow" data-toggle="owl"
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "items": 3,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "600": {
                                    "items":2
                                },
                                "992": {
                                    "items":3
                                }
                            }
                        }'>
                        @foreach ($getBlog as $blog)
                            <article class="entry entry-display">
                                <figure class="entry-media">
                                    <a href="{{ url('blog/' . $blog->slug) }}">
                                        <img src="{{ $blog->getImagen() }}"
                                            style="height: 400px; width: 100%; object-fit: cover;"
                                            alt="{{ $blog->titulo }}">
                                    </a>
                                </figure>

                                <div class="entry-body pb-4 text-center">
                                    <div class="entry-meta">
                                        <a href="javascript:;">{{ date('M d, Y', strtotime($blog->created_at)) }}</a>,
                                        {{ $blog->getComentarioCount() }} Commentarios
                                    </div>

                                    <h3 class="entry-title">
                                        <a href="{{ url('blog/' . $blog->slug) }}">{{ $blog->titulo }}</a>
                                    </h3>

                                    <div class="entry-content">
                                        <p>{{ $blog->descripcion_corta }}</p>
                                        <a href="{{ url('blog/' . $blog->slug) }}" class="read-more">Seguir leyendo</a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>

                <div class="more-container text-center mb-0 mt-3">
                    <a href="{{ url('blog') }}" class="btn btn-outline-darker btn-more">
                        <span>Ver más...</span>
                        <i class="icon-long-arrow-right"></i>
                    </a>
                </div>
            </div>
        @endif

        <div class="cta cta-display bg-image pt-4 pb-4"
            style="background-image: url(assets/images/backgrounds/cta/bg-6.jpg);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-9 col-xl-8">
                        <div class="row no-gutters flex-column flex-sm-row align-items-sm-center">
                            <div class="col">
                                <h3 class="cta-title text-white">Sign Up & Get 10% Off</h3><!-- End .cta-title -->
                                <p class="cta-desc text-white">Molla presents the best in interior design</p>
                                <!-- End .cta-desc -->
                            </div><!-- End .col -->

                            <div class="col-auto">
                                <a href="login.html" class="btn btn-outline-white"><span>SIGN UP</span><i
                                        class="icon-long-arrow-right"></i></a>
                            </div><!-- End .col-auto -->
                        </div><!-- End .row no-gutters -->
                    </div><!-- End .col-md-10 col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div>
    </main>
@endsection

@section('script')
    <script>
        $('body').delegate('.getCategoriaProducto', 'click', function() {
            var categoria_id = $(this).attr('data-val')
            $.ajax({
                url: "{{ url('recien_agregados_categoria_producto') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    categoria_id: categoria_id,
                },
                dataType: "json",
                success: function(response) {
                    $('.getCategoriaProducto' + categoria_id).html(response.success)
                }
            })
        })
    </script>
@endsection
