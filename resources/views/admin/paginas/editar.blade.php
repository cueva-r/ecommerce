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
                        <h1>Editar esta página</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href="{{ url('admin/paginas/listar') }}" class="btn btn-primary">
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
                                        <label>Nombre <span style="color: red">*</span></label>
                                        <input type="text" class="form-control"
                                            value="{{ old('nombre', $getRecord->nombre) }}" name="nombre">
                                    </div>

                                    <div class="form-group">
                                        <label>Título <span style="color: red">*</span></label>
                                        <input type="text" class="form-control"
                                            value="{{ old('titulo', $getRecord->titulo) }}" name="titulo">
                                    </div>

                                    <div class="form-group">
                                        <label>Imagen <span style="color: red">*</span></label>
                                        <input type="file" class="form-control" name="imagen">
                                        @if (!empty($getRecord->getImagen()))
                                            <br>
                                            <div class="col-lg-3">
                                                <div class="card">
                                                    <div class="card-body text-center">
                                                        <img style="width: 200px;" src="{{ $getRecord->getImagen() }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Descripción <span style="color: red">*</span></label>
                                        <textarea class="form-control editor" name="descripcion">{{ old('descripcion', $getRecord->descripcion) }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Meta título <span style="color: red">*</span></label>
                                        <input type="text" class="form-control"
                                            value="{{ old('meta_titulo', $getRecord->meta_titulo) }}" required
                                            name="meta_titulo" placeholder="Meta título">
                                    </div>

                                    <div class="form-group">
                                        <label>Meta descripción</label>
                                        <textarea name="meta_descripcion" class="form-control" placeholder="Meta descripción">{{ old('meta_descripcion', $getRecord->meta_descripcion) }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Meta palabras clave</label>
                                        <input type="text" class="form-control"
                                            value="{{ old('meta_p_clave', $getRecord->meta_p_clave) }}" name="meta_p_clave"
                                            placeholder="Meta palabras clave">
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
