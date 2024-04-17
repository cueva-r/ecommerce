@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.0/css/responsive.bootstrap4.css">
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center">
            <div class="container">
                <h1 class="page-title">Pedidos</h1>
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
                                <table class="table table-striped" id="pedidos">
                                    <thead>
                                        <tr>
                                            <th>Número de pedido</th>
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
                                                <td>{{ $valor->numero_pedido }}</td>
                                                <td>{{ number_format($valor->cantidad_total, 2) }}</td>
                                                <td>{{ $valor->metodo_pago }}</td>
                                                <td>
                                                    @if ($valor->estado == 0)
                                                        Pendiente
                                                    @elseif ($valor->estado == 1)
                                                        En progreso
                                                    @elseif ($valor->estado == 2)
                                                        Entregado
                                                    @elseif ($valor->estado == 3)
                                                        Completado
                                                    @elseif ($valor->estado == 4)
                                                        Cancelado
                                                    @endif
                                                </td>
                                                <td>{{ date('d-m-Y h:i A', strtotime($valor->created_at)) }}</td>
                                                {{-- <td>{{ $valor->created_at->diffForHumans() }}</td> --}}
                                                <td>
                                                    <a href="{{ url('cliente/pedidos/detalles/' . $valor->id) }}"
                                                        class="btn btn-outline-success btn-sm">
                                                        <i class="fa-solid fa-circle-info"></i>
                                                    </a>
                                                </td>
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
        new DataTable('#pedidos', {
            responsive: true,
            autoWidth: false,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se encontró nada - lo siento",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                "search": "Buscar:"
            }
        });
    </script>
@endsection
