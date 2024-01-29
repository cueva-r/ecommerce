@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Agregar un administrador</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/admin/listar') }}" class="btn btn-primary">
                            <i class="fa-solid fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form action="" method="POST">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" required name="nombre"
                                            placeholder="Ingrese el nombre">
                                    </div>
                                    <div class="form-group">
                                        <label ">Email</label>
                                            <input type="email" class="form-control" required name="email" placeholder="Ingrese el email">
                                        </div>
                                        <div class="form-group">
                                            <label>Clave</label>
                                            <input type="password" class="form-control" required name="password" placeholder="Ingrese la clave">
                                        </div>
                                        <div class="form-group">
                                            <label>Estado</label>
                                            <select class="form-control" required name="estado">
                                                <option value="0">Activo</option>
                                                <option value="1">Inactivo</option>
                                            </select>
                                        </div>
                                    </div>
                                    

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Agregar</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
@endsection

@section('script')
@endsection
