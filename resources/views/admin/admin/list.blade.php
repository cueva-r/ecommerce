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
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/admin/agregar') }}" class="btn btn-primary">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('admin.layouts._message')
                        {{-- <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Lista de administradores</h3>
                            </div>
                        </div> --}}

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Lista de administradores</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="usuarios">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Estado</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $valor)
                                            <tr>
                                                <td>{{ $valor->id }}</td>
                                                <td>{{ $valor->name }}</td>
                                                <td>{{ $valor->email }}</td>
                                                <td>{{ $valor->estado == 0 ? 'Activo' : 'Inactivo' }}</td>
                                                <td>
                                                    <a href="{{ url('admin/admin/editar/' . $valor->id) }}"
                                                        class="btn btn-outline-primary btn-sm">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <a href="{{ url('admin/admin/eliminar/' . $valor->id) }}"
                                                        class="btn btn-outline-danger btn-sm">
                                                        <i class="fa-solid fa-trash"></i>
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
        new DataTable('#usuarios', {
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
