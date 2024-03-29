@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Agregar un nuevo código de descuento</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/codigo_descuento/listar') }}" class="btn btn-primary">
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
                                        <label>Nombre <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" value="{{old('nombre')}}" required name="nombre"
                                            placeholder="Nombre del código de descuento">
                                    </div>

                                    <div class="form-group">
                                        <label>Tipo  <span style="color: red">*</span></label>
                                        <select class="form-control" required name="tipo">
                                            <option {{(old('tipo') == 'Cantidad') ? 'selected' : ''}} value="Cantidad">Cantidad</option>
                                            <option {{(old('tipo') == 'Porcentaje') ? 'selected' : ''}} value="Porcentaje">Porcentaje</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Porcentaje / cantidad <span style="color: red">*</span></label>
                                        <input type="number" class="form-control" min="0" max="100" value="{{old('porcentaje_cantidad')}}" required name="porcentaje_cantidad"
                                            placeholder="Porcentaje / cantidad no superar de 100">
                                    </div>

                                    <div class="form-group">
                                        <label>Fecha de expiración <span style="color: red">*</span></label>
                                        <input type="date" class="form-control" value="{{old('fecha_expiracion')}}" required name="fecha_expiracion">
                                    </div>

                                    <div class="form-group">
                                        <label>Estado  <span style="color: red">*</span></label>
                                        <select class="form-control" required name="estado">
                                            <option {{(old('porcentaje_cantidad') == 0) ? 'selected' : ''}} value="0">Activo</option>
                                            <option {{(old('porcentaje_cantidad') == 1) ? 'selected' : ''}} value="1">Inactivo</option>
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
            </section>
        </div>
@endsection

@section('script')
@endsection
