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
                        <h2 class="title mb-1">Got Any Questions?</h2>
                        <p class="mb-2">Use the form below to get in touch with the sales team</p>

                        <form action="#" class="contact-form mb-3">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="cname" class="sr-only">Name</label>
                                    <input type="text" class="form-control" id="cname" placeholder="Name *" required>
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label for="cemail" class="sr-only">Email</label>
                                    <input type="email" class="form-control" id="cemail" placeholder="Email *"
                                        required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="cphone" class="sr-only">Phone</label>
                                    <input type="tel" class="form-control" id="cphone" placeholder="Phone">
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <label for="csubject" class="sr-only">Subject</label>
                                    <input type="text" class="form-control" id="csubject" placeholder="Subject">
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->

                            <label for="cmessage" class="sr-only">Message</label>
                            <textarea class="form-control" cols="30" rows="4" id="cmessage" required placeholder="Message *"></textarea>

                            <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                                <span>SUBMIT</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
