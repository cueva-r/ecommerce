@extends('layouts.app')

@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('') }}">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $getPage->titulo }}</li>
                </ol>
            </div>
        </nav>
        <div class="container">
            <div class="page-header page-header-big text-center"
                style="background-image: url('{{ $getPage->getImagen() }}')">
                <h1 class="page-title text-white">{{ $getPage->titulo }}</h1>
            </div>
        </div>

        <div class="page-content pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mb-2 mb-lg-0">
                        {!! $getPage->descripcion !!}
                        <br>

                        <div class="row">
                            <div class="col-sm-7">
                                <div class="contact-info">
                                    <ul class="contact-list">
                                        @if (!empty($configuracionSistema->direccion))
                                            <li>
                                                <i class="icon-map-marker"></i>
                                                {{ $configuracionSistema->direccion }}
                                            </li>
                                        @endif

                                        @if (!empty($configuracionSistema->telefono))
                                            <li>
                                                <i class="icon-phone"></i>
                                                <a
                                                    href="tel:{{ $configuracionSistema->telefono }}">{{ $configuracionSistema->telefono }}</a>
                                            </li>
                                        @endif

                                        @if (!empty($configuracionSistema->telefono_dos))
                                            <li>
                                                <i class="icon-phone"></i>
                                                <a
                                                    href="tel:{{ $configuracionSistema->telefono_dos }}">{{ $configuracionSistema->telefono_dos }}</a>
                                            </li>
                                        @endif

                                        @if (!empty($configuracionSistema->email))
                                            <li>
                                                <i class="icon-envelope"></i>
                                                <a
                                                    href="mailto:{{ $configuracionSistema->email }}">{{ $configuracionSistema->email }}</a>
                                            </li>
                                        @endif

                                        @if (!empty($configuracionSistema->email_dos))
                                            <li>
                                                <i class="icon-envelope"></i>
                                                <a
                                                    href="mailto:{{ $configuracionSistema->email_dos }}">{{ $configuracionSistema->email_dos }}</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <div class="contact-info">
                                    <ul class="contact-list">
                                        @if (!empty($configuracionSistema->hora_trabajo))
                                            
                                        @endif
                                        <li>
                                            <i class="icon-clock-o"></i>
                                            {{ $configuracionSistema->hora_trabajo }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="title mb-1">¿Tiene alguna pregunta?</h2>
                        <p class="mb-2">Utilice el siguiente formulario para ponerse en contacto con el equipo de ventas.</p>
                        <div style="padding-top: 20px; padding-bottom: 20px;">
                            @include('layouts._message')
                        </div>
                        <form action="#" class="contact-form mb-3" autocomplete="off" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="cname" class="sr-only">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="name" placeholder="Nombre *" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="cemail" class="sr-only">Email</label>
                                    <input type="email" class="form-control" name="email" id="cemail" placeholder="Email *"
                                        required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="cphone" class="sr-only">Teléfono</label>
                                    <input type="tel" class="form-control" name="telefono" id="cphone" placeholder="Teléfono *" required>
                                </div>

                                <div class="col-sm-6">
                                    <label for="csubject" class="sr-only">Subjeto</label>
                                    <input type="text" class="form-control" name="subjeto" id="csubject" placeholder="Subjeto *" required>
                                </div>
                            </div>

                            <label for="cmessage" class="sr-only">Mensaje</label>
                            <textarea class="form-control" cols="30" rows="4" name="mensaje" id="cmessage" required placeholder="Mensaje *"></textarea>

                            <div class="col-sm-6">
                                <label for="verificacion">{{ $primer_numero }} + {{ $segundo_numero }} = ?</label>
                                <input type="text" class="form-control" name="verificacion" id="verificacion" required placeholder="Verificación de suma">
                            </div>

                            <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                                <span>Enviar</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
