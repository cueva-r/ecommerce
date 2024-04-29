<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <div class="header-dropdown">
                    <a href="#">Idioma</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">Español</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="header-right">
                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            <li><a href="tel:{{ $configuracionSistemaApp->telefono }}"><i class="icon-phone"></i>Llamar: {{ $configuracionSistemaApp->telefono }}</a></li>
                            <li>
                                <a href="{{ url('sobre-nosotros') }}">
                                    Sobre nosotros
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('contactenos') }}">
                                    Contáctenos
                                </a>
                            </li>
                            @if (!empty(Auth::check()))
                                <li>
                                    <a href="{{ url('mi-lista-de-deseos') }}">
                                        <i class="icon-heart-o"></i>Lista de deseos
                                        {{-- <span>(3)</span> --}}
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="#signin-modal" data-toggle="modal">
                                        <i class="icon-heart-o"></i>Lista de deseos
                                    </a>
                                </li>
                            @endif

                            @if (!empty(Auth::check()))
                                <li><a href="{{ url('cliente/dashboard') }}"><i class="icon-user"></i>
                                        {{ Auth::user()->name }}</a></li>
                                {{-- <li><a href="{{ url('admin/cerrar-sesion') }}">Cerar sesión</a></li>  --}}
                            @else
                                <li><a href="#signin-modal" data-toggle="modal"><i class="icon-user"></i>Iniciar
                                        sesión</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="header-middle sticky-header">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="{{ url('/') }}" class="logo">
                    <img src="{{ $configuracionSistemaApp->getLogo() }}" alt="rico's Logo" width="150" height="25">
                </a>

                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="megamenu-container active">
                            <a href="{{ url('/') }}">Inicio</a>
                        </li>
                        <li>
                            <a href="javascript:;" class="sf-with-ul">Tienda</a>
                            <div class="megamenu megamenu-md">
                                <div class="row no-gutters">
                                    <div class="col-md-12">
                                        <div class="menu-col">
                                            <div class="row">
                                                @php
                                                    $getCategoriasHeader = App\Models\CategoriaModel::getRecordMenu();
                                                @endphp
                                                @foreach ($getCategoriasHeader as $valor_h_c)
                                                    @if (!empty($valor_h_c->getSubcategoria->count()))
                                                        <div class="col-md-4" style="margin-bottom: 20px;">
                                                            <a href="{{ url($valor_h_c->slug) }}"
                                                                class="menu-title">{{ $valor_h_c->nombre }}</a>
                                                            <ul>
                                                                @foreach ($valor_h_c->getSubcategoria as $valor_h_sub)
                                                                    <li><a
                                                                            href="{{ url($valor_h_c->slug . '/' . $valor_h_sub->slug) }}">{{ $valor_h_sub->nombre }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="header-right">
                <div class="header-search">
                    <a href="#" class="search-toggle" role="button" title="Search"><i
                            class="icon-search"></i></a>
                    <form action="{{ url('buscar') }}" method="get">
                        <div class="header-search-wrapper">
                            <label for="q" class="sr-only">Buscar</label>
                            <input type="search" class="form-control" name="q"
                                value="{{ !empty(Request::get('q')) ? Request::get('q') : '' }}" id="q"
                                placeholder="Buscar aquí..." required>
                        </div>
                    </form>
                </div>

                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" data-display="static">
                        <i class="icon-shopping-cart"></i>
                        <span class="cart-count">{{ Cart::getContent()->count() }}</span>
                    </a>

                    @if (!empty(Cart::getContent()->count()))
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-cart-products">
                                @foreach (Cart::getContent() as $header_carrito)
                                    @php
                                        $getCarritoProducto = App\Models\ProductoModel::getSingle($header_carrito->id);
                                    @endphp
                                    @if (!empty($getCarritoProducto))
                                        @php
                                            $getProductoImagen = $getCarritoProducto->getImagenSingle(
                                                $getCarritoProducto->id,
                                            );
                                        @endphp
                                        <div class="product">
                                            <div class="product-cart-details">
                                                <h4 class="product-title">
                                                    <a
                                                        href="{{ url($getCarritoProducto->slug) }}">{{ $getCarritoProducto->titulo }}</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span
                                                        class="cart-product-qty">{{ $header_carrito->quantity }}</span>
                                                    x s/. {{ number_format($header_carrito->price, 2) }}
                                                </span>
                                            </div>

                                            <figure class="product-image-container">
                                                <a href="{{ url($getCarritoProducto->slug) }}" class="product-image">
                                                    <img src="{{ $getProductoImagen->getLogo() }}" alt="product">
                                                </a>
                                            </figure>
                                            <a href="{{ url('carrito/eliminar/' . $header_carrito->id) }}"
                                                class="btn-remove" title="Quitar producto"><i
                                                    class="icon-close"></i></a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>

                            <div class="dropdown-cart-total">
                                <span>Total</span>

                                <span class="cart-total-price">S/. {{ number_format(Cart::getSubtotal(), 2) }}</span>
                            </div>

                            <div class="dropdown-cart-action">
                                <a href="{{ url('carrito') }}" class="btn btn-primary">Ver carrito</a>
                                <a href="{{ url('pagar') }}" class="btn btn-outline-primary-2"><span>Pagar</span><i
                                        class="icon-long-arrow-right"></i></a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
