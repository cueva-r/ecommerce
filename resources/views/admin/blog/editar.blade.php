@extends('admin.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ url('public/assets/plugins/summernote/summernote-bs4.min.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Editar este blog</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/blog/listar') }}" class="btn btn-primary">
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
                                        <input type="text" class="form-control" value="{{ $getRecord->titulo }}" required
                                            name="titulo" placeholder="Título del blog">
                                        <div style="color: red">{{ $errors->first('titulo') }}</div>
                                    </div>

                                    <div class="form-group">
                                        <label>Nombre de categoría <span style="color: red">*</span></label>
                                        <select class="form-control" name="blogcategoria_id" required>
                                            <option value="">Seleccionar</option>
                                            @foreach ($getCategoria as $bcategoria)
                                                <option {{ ($getRecord->blogcategoria_id == $bcategoria->id) ? 'selected' : '' }} value="{{ $bcategoria->id }}">{{ $bcategoria->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Imágen <span style="color: red">*</span></label>
                                        <input type="file" class="form-control" name="nombre_imagen">
                                        @if (!empty($getRecord->getImagen()))
                                            <br>
                                            <div class="col-lg-3">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <img src="{{ $getRecord->getImagen() }}" style="width: 200px">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Descripción corta <span style="color: red">*</span></label>
                                        <textarea class="form-control" name="descripcion_corta">{{ $getRecord->descripcion_corta }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Descripción <span style="color: red">*</span></label>
                                        <textarea class="form-control editor" name="descripcion">{{ $getRecord->descripcion }}</textarea>
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <label>Estado <span style="color: red">*</span></label>
                                        <select class="form-control" required name="estado">
                                            <option {{  ($getRecord->estado == 0) ? 'selected' : '' }} value="0">Activo
                                            </option>
                                            <option {{  ($getRecord->estado == 1) ? 'selected' : '' }} value="1">Inactivo
                                            </option>
                                        </select>
                                    </div>
                                    <hr>

                                    <div class="form-group">
                                        <label>Meta título <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" value="{{ $getRecord->meta_titulo }}" required
                                            name="meta_titulo" placeholder="Meta título">
                                    </div>

                                    <div class="form-group">
                                        <label>Meta descripción</label>
                                        <textarea name="meta_descripcion" class="form-control" placeholder="Meta descripción">{{ $getRecord->meta_descripcion }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Meta palabras clave</label>
                                        <input type="text" class="form-control" value="{{ $getRecord->meta_p_clave}}"
                                            name="meta_p_clave" placeholder="Meta palabras clave">
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
<script src="{{ url('public/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ url('public/sortable/jquery-ui.js') }}"></script>

    <script>
        // Summernote
        $('.editor').summernote({
            height: 200
        });
    </script>
@endsection
