@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ url('assets/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/plugins/nouislider/nouislider.css') }}">

    <style>
        .active-color {
            border: 3px solid #000 !important;
        }
    </style>
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{ url('assets/images/page-header-bg.jpg') }}')">
            <div class="container">
                @if (!empty($getSubCategoria))
                    <h1 class="page-title">{{ $getSubCategoria->nombre }}<span></span></h1>
                @elseif (!empty($getCategoria))
                    <h1 class="page-title">{{ $getCategoria->nombre }}<span></span></h1>
                @else
                    <h3 class="page-title">Resultados de: {{ Request::get('q') }}<span></span></h3>
                @endif
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">Shop</a></li>
                    @if (!empty($getSubCategoria))
                        <li class="breadcrumb-item" aria-current="page"><a
                                href="{{ $getCategoria->slug }}">{{ $getCategoria->nombre }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a
                                href="{{ $getSubCategoria->slug }}">{{ $getSubCategoria->nombre }}</a></li>
                    @elseif(!empty($getCategoria))
                        <li class="breadcrumb-item active" aria-current="page">{{ $getCategoria->nombre }}</li>
                    @endif
                </ol>
            </div>
        </nav>

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="toolbox">
                            <div class="toolbox-left">
                                <div class="toolbox-info">
                                    Mostrando <span>{{ $getProducto->perPage() }} de {{ $getProducto->total() }}</span> Productos
                                </div>
                            </div>

                            <div class="toolbox-right">
                                <div class="toolbox-sort">
                                    <label for="sortby">Mostrar por:</label>
                                    <div class="select-custom">
                                        <select name="sortby" id="sortby" class="form-control changeSortBy">
                                            <option value="">Seleccionar</option>
                                            <option value="popularity">Más popular</option>
                                            <option value="rating">Más valorado</option>
                                            <option value="date">Fecha</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="getProductoAjax">
                            @include('productos._listar')
                        </div>
                        <div style="text-align: center">
                            <a href="javascript:;" @if (empty($page)) style="display: none" @endif
                                data-page="{{ $page }}" class="btn btn-primary verMas">Ver más...</a>
                        </div>
                    </div>

                    <aside class="col-lg-3 order-lg-first">
                        <form action="" id="filtroForm" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="old_sub_categoria_id"
                                value="{{ !empty(Request::get('q')) ? Request::get('q') : '' }}">
                            <input type="hidden" name="old_sub_categoria_id"
                                value="{{ !empty($getSubCategoria) ? $getSubCategoria->id : '' }}">
                            <input type="hidden" name="old_categoria_id"
                                value="{{ !empty($getCategoria) ? $getCategoria->id : '' }}">

                            <input type="hidden" name="sub_categoria_id" id="get_sub_categoria_id">
                            <input type="hidden" name="marca_id" id="get_marca_id">
                            <input type="hidden" name="color_id" id="get_color_id">
                            <input type="hidden" name="sort_by_id" id="get_sort_by_id">
                            <input type="hidden" name="inicio_precio" id="get_inicio_precio">
                            <input type="hidden" name="fin_precio" id="get_fin_precio">
                        </form>
                        <div class="sidebar sidebar-shop">
                            <div class="widget widget-clean">
                                <label>Filtros:</label>
                                {{-- <a href="#" class="sidebar-filter-clear">Clean All</a> --}}
                            </div>

                            @if (!empty($getSubcategoriaFiltro))
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true"
                                            aria-controls="widget-1">
                                            Categorías
                                        </a>
                                    </h3>

                                    <div class="collapse show" id="widget-1">
                                        <div class="widget-body">
                                            <div class="filter-items filter-items-count">
                                                @foreach ($getSubcategoriaFiltro as $f_categoria)
                                                    <div class="filter-item">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input changeCategoria"
                                                                value="{{ $f_categoria->id }}"
                                                                id="cat-{{ $f_categoria->id }}">
                                                            <label class="custom-control-label"
                                                                for="cat-{{ $f_categoria->id }}">{{ $f_categoria->nombre }}</label>
                                                        </div>
                                                        <span class="item-count">{{ $f_categoria->totalProductos() }}</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true"
                                        aria-controls="widget-2">
                                        Tamaño
                                    </a>
                                </h3>

                                <div class="collapse show" id="widget-2">
                                    <div class="widget-body">
                                        <div class="filter-items">
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="size-1">
                                                    <label class="custom-control-label" for="size-1">XS</label>
                                                </div>
                                            </div>

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="size-2">
                                                    <label class="custom-control-label" for="size-2">S</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" checked
                                                        id="size-3">
                                                    <label class="custom-control-label" for="size-3">M</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" checked
                                                        id="size-4">
                                                    <label class="custom-control-label" for="size-4">L</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="size-5">
                                                    <label class="custom-control-label" for="size-5">XL</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->

                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="size-6">
                                                    <label class="custom-control-label" for="size-6">XXL</label>
                                                </div><!-- End .custom-checkbox -->
                                            </div><!-- End .filter-item -->
                                        </div><!-- End .filter-items -->
                                    </div><!-- End .widget-body -->
                                </div><!-- End .collapse -->
                            </div> --}}

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true"
                                        aria-controls="widget-3">
                                        Color
                                    </a>
                                </h3>

                                <div class="collapse show" id="widget-3">
                                    <div class="widget-body">
                                        <div class="filter-colors">
                                            @foreach ($getColor as $f_color)
                                                <a href="javascript:;" id="{{ $f_color->id }}" data-val="0"
                                                    class="changeColor" style="background: {{ $f_color->codigo }};">
                                                    <span class="sr-only">{{ $f_color->nombre }}</span>
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true"
                                        aria-controls="widget-4">
                                        Marcas
                                    </a>
                                </h3>

                                <div class="collapse show" id="widget-4">
                                    <div class="widget-body">
                                        <div class="filter-items">
                                            @foreach ($getMarca as $f_marca)
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input changeMarca"
                                                            value="{{ $f_marca->id }}" id="brand-{{ $f_marca->id }}">
                                                        <label class="custom-control-label"
                                                            for="brand-{{ $f_marca->id }}">{{ $f_marca->nombre }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="widget widget-collapsible">
                                <h3 class="widget-title">
                                    <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true"
                                        aria-controls="widget-5">
                                        Precio
                                    </a>
                                </h3>

                                <div class="collapse show" id="widget-5">
                                    <div class="widget-body">
                                        <div class="filter-price">
                                            <div class="filter-price-text">
                                                Rango de precio:
                                                <span id="filter-price-range"></span>
                                            </div>

                                            <div id="price-slider"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script src="{{ url('assets/js/wNumb.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap-input-spinner.js') }}"></script>
    <script src="{{ url('assets/js/nouislider.min.js') }}"></script>

    <script>
        $('.changeSortBy').change(function() {
            var id = $(this).val();
            $('#get_sort_by_id').val(id);
            filtroForm();
        });

        $('.changeCategoria').change(function() {
            var ids = '';
            $('.changeCategoria').each(function() {
                if (this.checked) {
                    var id = $(this).val();
                    ids += id + ',';
                }
            });

            $('#get_sub_categoria_id').val(ids);
            filtroForm();
        });

        $('.changeMarca').change(function() {
            var ids = '';
            $('.changeMarca').each(function() {
                if (this.checked) {
                    var id = $(this).val();
                    ids += id + ',';
                }
            });

            $('#get_marca_id').val(ids);
            filtroForm();
        });

        $('.changeColor').click(function() {
            var id = $(this).attr('id');
            var estado = $(this).attr('data-val');
            if (estado == 0) {
                $(this).attr('data-val', 1);
                $(this).addClass('active-color');
            } else {
                $(this).attr('data-val', 0);
                $(this).removeClass('active-color');
            }

            var ids = '';
            $('.changeColor').each(function() {
                var estado = $(this).attr('data-val');
                if (estado == 1) {
                    var id = $(this).attr('id');
                    ids += id + ',';
                }
            });

            $('#get_color_id').val(ids);
            filtroForm();
        });

        var xhr;

        function filtroForm() {
            if (xhr && xhr.readyState != 4) {
                xhr.abort();
            }

            xhr = $.ajax({
                type: "POST",
                url: "{{ url('get_filtro_producto_ajax') }}",
                data: $('#filtroForm').serialize(),
                dataType: "json",
                success: function(data) {
                    $('#getProductoAjax').html(data.success);

                    if (data.page == 0) {
                        $('.verMas').hide();
                    } else {
                        $('.verMas').show();
                    }
                },
                error: function(data) {}
            });
        }

        $('body').delegate('.verMas', 'click', function() {
            var page = $(this).attr('data-page');

            $('.verMas').html('Cargando...');

            if (xhr && xhr.readyState != 4) {
                xhr.abort();
            }

            xhr = $.ajax({
                type: "POST",
                url: "{{ url('get_filtro_producto_ajax') }}?page="+page,
                data: $('#filtroForm').serialize(),
                dataType: "json",
                success: function(data) {
                    $('#getProductoAjax').append(data.success);
                    $('.verMas').attr('data-page', data.page);
                    $('.verMas').html('Ver más...');

                    if (data.page == 0) {
                        $('.verMas').hide();
                    } else {
                        $('.verMas').show();
                    }
                },
                error: function(data) {}
            });
        });

        var i = 0;

        if (typeof noUiSlider === 'object') {
            var priceSlider = document.getElementById('price-slider');

            noUiSlider.create(priceSlider, {
                start: [0, 10000],
                connect: true,
                step: 1,
                margin: 1,
                range: {
                    'min': 0,
                    'max': 10000
                },
                tooltips: true,
                format: wNumb({
                    decimals: 0,
                    prefix: 'S/. '
                })
            });

            priceSlider.noUiSlider.on('update', function(values, handle) {
                var inicio_precio = values[0];
                var fin_precio = values[1];
                $('#get_inicio_precio').val(inicio_precio);
                $('#get_fin_precio').val(fin_precio);
                $('#filter-price-range').text(values.join(' - '));

                if (i == 0 || i == 1) {
                    i++;
                } else {
                    filtroForm();
                }
            });
        }
    </script>
@endsection
