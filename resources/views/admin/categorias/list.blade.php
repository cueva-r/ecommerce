@extends('admin.layouts.app')

@section('style')
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
                        <a href="{{ url('admin/categorias/agregar') }}" class="btn btn-primary">
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
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Lista de categorías</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Slug</th>
                                            <th>Meta título</th>
                                            <th>Meta descripción</th>
                                            <th>Meta palabras clave</th>
                                            <th>Creado por</th>
                                            <th>Estado</th>
                                            <th>Fecha creación</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $valor)
                                            <tr>
                                                <td>{{ $valor->id }}</td>
                                                <td>{{ $valor->nombre }}</td>
                                                <td>{{ $valor->slug }}</td>
                                                <td>{{ $valor->meta_titulo }}</td>
                                                <td>{{ $valor->meta_descripcion }}</td>
                                                <td>{{ $valor->meta_p_clave }}</td>
                                                <td>{{ $valor->created_by_name }}</td>
                                                <td>{{ $valor->estado == 0 ? 'Activo' : 'Inactivo' }}</td>
                                                <td>{{ date('d-m-Y', strtotime($valor->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ url('admin/categorias/editar/' . $valor->id) }}"
                                                        class="btn btn-outline-primary">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    <a href="{{ url('admin/categorias/eliminar/' . $valor->id) }}"
                                                        class="btn btn-outline-danger">
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
@endsection