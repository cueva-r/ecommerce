@extends('admin.layouts.app')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.0/css/responsive.bootstrap4.css">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-2">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1">
                                <i class="fa-solid fa-list"></i>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">Pedidos totales</span>
                                <span class="info-box-number">{{ $totalPedidos }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-2">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-primary elevation-1">
                                <i class="fas fa-shopping-cart"></i>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">Pedidos de hoy</span>
                                <span class="info-box-number">{{ $totalPedidosHoy }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-2">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-secondary elevation-1">
                                <i class="fa-solid fa-money-bill"></i>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">Cantidad total</span>
                                <span class="info-box-number">s/. {{ number_format($cantidadTotal, 2) }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-2">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-info elevation-1">
                                <i class="fa-solid fa-money-bill"></i>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">Cantidad de hoy</span>
                                <span class="info-box-number">s/. {{ number_format($cantidadTotalHoy, 2) }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-2">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1">
                                <i class="fa-solid fa-users"></i>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total de clientes</span>
                                <span class="info-box-number">{{ $totalClientes }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-2">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1">
                                <i class="fa-solid fa-users"></i>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total de clientes hoy</span>
                                <span class="info-box-number">{{ $totalClientesHoy }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Ventas</h3>
                                <select class="form-control cambiarAño" style="width: 100px;">
                                    @for ($i = 2020; $i <= date('Y'); $i++)
                                        <option {{ $año == $i ? 'selected' : '' }} value="{{ $i }}">
                                            {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <span class="text-bold text-lg">s/. {{ number_format($cantidadTotal, 2) }}</span>
                                    <span>Ventas a lo largo del tiempo</span>
                                </p>
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <canvas id="sales-chart-pedidos" height="200"></canvas>
                            </div>

                            <div class="d-flex flex-row justify-content-end">
                                <span class="mr-2">
                                    <i class="fas fa-square text-primary"></i> Clientes
                                </span>

                                <span class="mr-2">
                                    <i class="fas fa-square text-gray"></i> Pedidos
                                </span>

                                <span>
                                    <i class="fas fa-square text-danger"></i> Cantidad
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header border-0">
                            <h3 class="card-title">Últimos pedidos</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-responsive table-striped" id="ultimosPedidos">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Número de pedido</th>
                                                <th>Nombres</th>
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
                                                <th>Fecha creación</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mostrarUltimosPedidos as $valor)
                                                <tr>
                                                    <td>{{ $valor->id }}</td>
                                                    <td>{{ $valor->numero_pedido }}</td>
                                                    <td>{{ $valor->nombres }} {{ $valor->apellidos }}</td>
                                                    <td>{{ $valor->pais }}</td>
                                                    <td>{{ $valor->primera_direccion }} <br>
                                                        {{ $valor->segunda_direccion }}
                                                    </td>
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
                                    {!! $mostrarUltimosPedidos->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
    {{-- <script src="{{ url('public/assets/dist/js/pages/dashboard3.js') }}"></script> --}}

    {{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap4.js"></script>

    <script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.0/js/responsive.bootstrap4.js"></script>

    <script>
        new DataTable('#ultimosPedidos', {
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
    </script> --}}

    <script>
        $('.cambiarAño').change(function() {
            var año = $(this).val()
            window.location.href = "{{ url('admin/dashboard?año=') }}" + año
        })

        var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
        }

        var mode = 'index'
        var intersect = true

        var $salesChart = $('#sales-chart-pedidos')
        // eslint-disable-next-line no-unused-vars
        var salesChart = new Chart($salesChart, {
            type: 'bar',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
                    'Octuber', 'Noviembre', 'Diciembre'
                ],
                datasets: [{
                        backgroundColor: '#007bff',
                        borderColor: '#007bff',
                        data: [{{ $mostrarTotalClientesPorMes }}]
                    },
                    {
                        backgroundColor: '#ced4da',
                        borderColor: '#ced4da',
                        data: [{{ $mostrarTotalPedidosPorMes }}]
                    },
                    {
                        backgroundColor: '#dc3545',
                        borderColor: '#dc3545',
                        data: [{{ $mostrarTotalCantidadPedidosPorMes }}]
                    }
                ]
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    mode: mode,
                    intersect: intersect
                },
                hover: {
                    mode: mode,
                    intersect: intersect
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        // display: false,
                        gridLines: {
                            display: true,
                            lineWidth: '4px',
                            color: 'rgba(0, 0, 0, .2)',
                            zeroLineColor: 'transparent'
                        },
                        ticks: $.extend({
                            beginAtZero: true,

                            // Include a dollar sign in the ticks
                            callback: function(value) {
                                if (value >= 1000) {
                                    value /= 1000
                                    value += 'k'
                                }

                                return 's/.' + value
                            }
                        }, ticksStyle)
                    }],
                    xAxes: [{
                        display: true,
                        gridLines: {
                            display: false
                        },
                        ticks: ticksStyle
                    }]
                }
            }
        })
    </script>
@endsection
