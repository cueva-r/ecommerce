@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Configuración del sistema</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('layouts._message')
                        <div class="card card-primary">
                            <form action="" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Sitio web</label>
                                        <input type="text" class="form-control" value="{{ $getRecord->nombre_sitioweb }}" name="nombre_sitioweb">
                                    </div>

                                    <div class="form-group">
                                        <label>Logo</label>
                                        <input type="file" class="form-control" name="logo">
                                        @if (!empty($getRecord->getLogo()))
                                            <img src="{{ $getRecord->getLogo() }}" style="width: 200px;">
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Favicon</label>
                                        <input type="file" class="form-control" name="favicon">
                                        @if (!empty($getRecord->getFavicon()))
                                            <img src="{{ $getRecord->getFavicon() }}" style="width: 50px;">
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Descripción del pie de página</label>
                                        <textarea name="descripcion_pie_pagina" class="form-control">{{ $getRecord->descripcion_pie_pagina }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Pie de página Pagos icono</label>
                                        <input type="file" class="form-control" name="pie_pagina_pagos_icono">
                                        @if (!empty($getRecord->getPiePaginaIcono()))
                                            <img src="{{ $getRecord->getPiePaginaIcono() }}" style="width: 200px;">
                                        @endif
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <label>Dirección</label>
                                        <textarea name="direccion" class="form-control">{{ $getRecord->direccion }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Teléfono</label>
                                        <input type="text" class="form-control" value="{{ $getRecord->telefono }}" name="telefono">
                                    </div>

                                    <div class="form-group">
                                        <label>Teléfono 2</label>
                                        <input type="text" class="form-control" value="{{ $getRecord->telefono_dos }}" name="telefono_dos">
                                    </div>

                                    <div class="form-group">
                                        <label>Enviar correo electrónico de contacto</label>
                                        <input type="text" class="form-control" value="{{ $getRecord->enviar_email }}" name="enviar_email">
                                    </div>

                                    <div class="form-group">
                                        <label>Correo electrónico</label>
                                        <input type="text" class="form-control" value="{{ $getRecord->email_dos }}" name="email">
                                    </div>

                                    <div class="form-group">
                                        <label>Correo electrónico </label>
                                        <input type="text" class="form-control" value="{{ $getRecord->email_dos }}" name="email_dos">
                                    </div>

                                    <div class="form-group">
                                        <label>Hora de trabajo</label>
                                        <textarea name="hora_trabajo" class="form-control">{{ $getRecord->hora_trabajo }}</textarea>
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <label>Facebook link</label>
                                        <input type="text" class="form-control"  value="{{ $getRecord->facebook_link }}" name="facebook_link">
                                    </div>

                                    <div class="form-group">
                                        <label>Twitter link</label>
                                        <input type="text" class="form-control" value="{{ $getRecord->twitter_link }}" name="twitter_link">
                                    </div>

                                    <div class="form-group">
                                        <label>Instagram link</label>
                                        <input type="text" class="form-control" value="{{ $getRecord->instagram_link }}" name="instagram_link">
                                    </div>

                                    <div class="form-group">
                                        <label>GitHub link</label>
                                        <input type="text" class="form-control" value="{{ $getRecord->github_link }}" name="github_link">
                                    </div>

                                    <div class="form-group">
                                        <label>Linkedin link</label>
                                        <input type="text" class="form-control" value="{{ $getRecord->linkedin_link }}" name="linkedin_link">
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
