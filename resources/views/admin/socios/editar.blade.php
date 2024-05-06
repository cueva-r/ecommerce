@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Editar este slider</h1>
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
                                        <label>Imágen</label>
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
                                        <label>Link</label>
                                        <input type="text" class="form-control" value="{{ $getRecord->link_button }}"
                                            name="link_button" placeholder="Link">
                                    </div>

                                    <div class="form-group">
                                        <label>Estado <span style="color: red">*</span></label>
                                        <select class="form-control" required name="estado">
                                            <option {{ ($getRecord->estado == 0) ? 'selected' : '' }}
                                                value="0">Activo</option>
                                            <option {{ ($getRecord->estado == 1 ) ? 'selected' : '' }}
                                                value="1">Inactivo</option>
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
