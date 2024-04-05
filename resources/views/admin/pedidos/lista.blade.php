@extends('admin.layouts.app')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.0/css/responsive.bootstrap4.css">
@endsection

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Lista de administración</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('admin.layouts._message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Lista de pedidos</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="pedidos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID transacción</th>
                                            <th>Nombres</th>
                                            <th>Nombre compañía</th>
                                            <th>País</th>
                                            <th>Dirección</th>
                                            <th>Ciudad</th>
                                            <th>Distrito</th>
                                            <th>Código postal</th>
                                            <th>Teléfono</th>
                                            <th>Correo electrónico</th>
                                            <th>Código descuento</th>
                                            <th>Cantidad descuento (s/.)</th>
                                            <th>Cantidad envío (s/.)</th>
                                            <th>Cantidad total (s/.)</th>
                                            <th>Metodo pago</th>
                                            <th>Estado</th>
                                            <th>Fecha creación</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $valor)
                                            <tr>
                                                <td>{{ $valor->id }}</td>
                                                <td>{{ $valor->transaccion_id }}</td>
                                                <td>{{ $valor->nombres }} {{ $valor->apellidos }}</td>
                                                <td>{{ $valor->nombre_compania }}</td>
                                                <td>{{ $valor->pais }}</td>
                                                <td>{{ $valor->primera_direccion }} <br> {{ $valor->segunda_direccion }}</td>
                                                <td>{{ $valor->ciudad }}</td>
                                                <td>{{ $valor->distrito }}</td>
                                                <td>{{ $valor->codigo_postal }}</td>
                                                <td>{{ $valor->telefono }}</td>
                                                <td>{{ $valor->email }}</td>
                                                <td>{{ $valor->codigo_descuento }}</td>
                                                <td>{{ number_format($valor->cantidad_descuento, 2) }}</td>
                                                <td>{{ number_format($valor->cantidad_envio, 2) }}</td>
                                                <td>{{ number_format($valor->cantidad_total, 2) }}</td>
                                                <td>{{ $valor->metodo_pago }}</td>
                                                <td>{{ $valor->estado == 0 ? 'Activo' : 'Inactivo' }}</td>
                                                <td>{{ date('d-m-Y h:i A', strtotime($valor->created_at)) }}</td>
                                                {{-- <td>{{ $valor->created_at->diffForHumans() }}</td> --}}
                                                <td>
                                                    <a href="{{ url('admin/pedidos/detalles/' . $valor->id) }}"
                                                        class="btn btn-outline-success btn-sm">
                                                        <i class="fa-solid fa-circle-info"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- <div class="card-body p-0">
                                    
    
                                    <div style="padding: 10px; float: right;">
                                        {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                    </div>
    
                                </div> --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
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
        new DataTable('#pedidos', {
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
