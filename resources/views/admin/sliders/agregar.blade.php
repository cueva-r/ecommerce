@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Agregar un nuevo slider</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/sliders/lista') }}" class="btn btn-primary">
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
                            <form action="" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Título <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" value="{{old('titulo')}}" required name="titulo"
                                            placeholder="Título del slider">
                                    </div>

                                    <div class="form-group">
                                        <label>Imágen <span style="color: red">*</span></label>
                                        <input type="file" class="form-control" required name="nombre_imagen">
                                    </div>

                                    <div class="form-group">
                                        <label>Nombre del button </label>
                                        <input type="text" class="form-control" value="{{old('nombre_button')}}" name="nombre_button"
                                            placeholder="Nombre del button">
                                    </div>

                                    <div class="form-group">
                                        <label>Link del button</label>
                                        <input type="text" class="form-control" value="{{old('link_button')}}" name="link_button"
                                            placeholder="Link del button">
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
