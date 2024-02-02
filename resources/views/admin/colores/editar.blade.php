@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Editar este color</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/colores/listar') }}" class="btn btn-primary">
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
                                        <input type="text" class="form-control" value="{{old('nombre', $getRecord->nombre)}}" required name="nombre"
                                            placeholder="Nombre del color">
                                    </div>

                                    <div class="form-group">
                                        <label>Código <span style="color: red">*</span></label>
                                        <input type="color" class="form-control" value="{{old('codigo', $getRecord->codigo)}}" required name="codigo"
                                            placeholder="Código del color">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Estado  <span style="color: red">*</span></label>
                                        <select class="form-control" required name="estado">
                                            <option {{(old('estado', $getRecord->estado) == 0) ? 'selected' : ''}} value="0">Activo</option>
                                            <option {{(old('estado', $getRecord->estado) == 1) ? 'selected' : ''}} value="1">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                                    
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
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
