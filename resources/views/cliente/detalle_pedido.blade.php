@extends('layouts.app')

@section('style')
    <style>
        .form-group {
            margin-bottom: 2px;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.0/css/responsive.bootstrap4.css">
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center">
            <div class="container">
                <h1 class="page-title">Detalles del pedido</h1>
            </div>
        </div>

        <div class="page-content">
            <div class="dashboard">
                <div class="container">
                    <br>
                    <br>

                    <div class="row">

                        @include('cliente._sidebar')

                        <div class="col-md-8 col-lg-9">
                            <div class="tab-content">
                                <div class="">
                                    <div class="form-group">
                                        <label>Número de pedido : <span
                                                style="font-weight: normal;">{{ $getRecord->numero_pedido }}</span></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Nombres y apellidos : <span
                                                style="font-weight: normal;">{{ $getRecord->nombres }},
                                                {{ $getRecord->apellidos }}</span></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Nombre de compañía : <span
                                                style="font-weight: normal;">{{ $getRecord->nombre_compania }}</span></label>
                                    </div>

                                    <div class="form-group">
                                        <label>País : <span
                                                style="font-weight: normal;">{{ $getRecord->pais }}</span></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Dirección : <span
                                                style="font-weight: normal;">{{ $getRecord->primera_direccion }} -
                                                {{ $getRecord->segunda_direccion }}</span></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Ciudad : <span
                                                style="font-weight: normal;">{{ $getRecord->ciudad }}</span></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Distrito : <span
                                                style="font-weight: normal;">{{ $getRecord->distrito }}</span></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Código postal : <span
                                                style="font-weight: normal;">{{ $getRecord->codigo_postal }}</span></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Teléfono : <span
                                                style="font-weight: normal;">{{ $getRecord->telefono }}</span></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Correo electrónico : <span
                                                style="font-weight: normal;">{{ $getRecord->email }}</span></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Código de descuento : <span
                                                style="font-weight: normal;">{{ $getRecord->codigo_descuento }}</span></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Nombre de envío : <span
                                                style="font-weight: normal;">{{ $getRecord->getEnvio->nombre }}</span></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Cantidad de descuento (s/.) : <span
                                                style="font-weight: normal;">{{ number_format($getRecord->cantidad_descuento, 2) }}</span></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Cantidad de envío (s/.) : <span
                                                style="font-weight: normal;">{{ number_format($getRecord->cantidad_envio, 2) }}</span></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Cantidad total (s/.) : <span
                                                style="font-weight: normal;">{{ number_format($getRecord->cantidad_total, 2) }}</span></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Metodo de pago : <span
                                                style="font-weight: normal;">{{ $getRecord->metodo_pago }}</span></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Nota : <span
                                                style="font-weight: normal;">{{ $getRecord->notas }}</span></label>
                                    </div>

                                    <div class="form-group">
                                        <label>Estado :
                                            <span style="font-weight: normal;">
                                                @if ($getRecord->estado == 0)
                                                    Pendiente
                                                @elseif ($getRecord->estado == 1)
                                                    En progreso
                                                @elseif ($getRecord->estado == 2)
                                                    Entregado
                                                @elseif ($getRecord->estado == 3)
                                                    Completado
                                                @elseif ($getRecord->estado == 4)
                                                    Cancelado
                                                @endif
                                            </span>
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label>Fecha de creación : <span
                                                style="font-weight: normal;">{{ date('d-m-Y h:i A', strtotime($getRecord->created_at)) }}</span></label>
                                    </div>
                                </div>

                                <hr>

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Detalles del producto</h3>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped" id="detalles">
                                            <thead>
                                                <tr>
                                                    <th>Imágen</th>
                                                    <th>Nombre producto</th>
                                                    <th>Cantidad</th>
                                                    <th>Precio (s/.)</th>
                                                    <th>Cantidad tamaño (s/.)</th>
                                                    <th>Precio total (s/.)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($getRecord->getArticulo as $articulo)
                                                    @php
                                                        $getProductoImagen = $articulo->getProducto->getImagenSingle(
                                                            $articulo->getProducto->id,
                                                        );
                                                    @endphp
                                                    <tr>
                                                        <td>
                                                            <img style="width: 100px; height: 100px;"
                                                                src="{{ $getProductoImagen->getLogo() }}" alt="">
                                                        </td>
                                                        <td><a href="{{ url($articulo->getProducto->slug) }}"
                                                                target="_blank">{{ $articulo->getProducto->titulo }}</a>
                                                            <br>
                                                            Tamaño: {{ $articulo->nombre_tamano }} <br>
                                                            Color: {{ $articulo->nombre_color }} <br>
                                                        </td>
                                                        <td>{{ $articulo->cantidad }}</td>
                                                        <td>{{ number_format($articulo->precio, 2) }}</td>
                                                        <td>{{ $articulo->cantidad_tamano }}</td>
                                                        <td>{{ number_format($articulo->precio_total, 2) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap4.js"></script>

    <script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.0/js/responsive.bootstrap4.js"></script>

    <script>
        new DataTable('#detalles', {
            responsive: true,
            autoWidth: false,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se encontró nada - lo siento",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
            }
        });
    </script>
@endsection
