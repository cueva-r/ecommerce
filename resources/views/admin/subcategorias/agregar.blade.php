@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Agregar una nueva sub categoría</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/subcategorias/listar') }}" class="btn btn-primary">
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
                                        <label>Elegir categoría <span style="color: red">*</span></label>
                                        <select class="form-control" name="categoria_id">
                                            <option value="">Seleccionar</option>
                                            @foreach ($getCategorias as $valor)
                                                <option value="{{ $valor->id }}">{{ $valor->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nombre de la sub categoría <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" value="{{old('nombre')}}" required name="nombre"
                                            placeholder="Nombre de la categoría">
                                    </div>
                                    <div class="form-group">
                                        <label>Slug <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" value="{{old('slug')}}" required name="slug"
                                            placeholder="Slug exp. URL">
                                        <div style="color: red">{{$errors->first('slug')}}</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Estado  <span style="color: red">*</span></label>
                                        <select class="form-control" required name="estado">
                                            <option {{(old('estado') == 0) ? 'selected' : ''}} value="0">Activo</option>
                                            <option {{(old('estado') == 1) ? 'selected' : ''}} value="1">Inactivo</option>
                                        </select>
                                    </div>
                                    <hr>

                                    <div class="form-group">
                                        <label>Meta título  <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" value="{{old('meta_titulo')}}" required name="meta_titulo"
                                            placeholder="Meta título">
                                    </div>

                                    <div class="form-group">
                                        <label>Meta descripción</label>
                                        <textarea name="meta_descripcion" class="form-control" placeholder="Meta descripción">{{ old('meta_descripcion') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Meta palabras clave</label>
                                        <input type="text" class="form-control" value="{{old('meta_p_clave')}}"  name="meta_p_clave"
                                            placeholder="Meta palabras clave">
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
