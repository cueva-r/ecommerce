<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ !empty($meta_titulo) ? $meta_titulo : '' }}</title>

    @if (!empty($meta_p_clave))
        <meta name="keywords" content="{{ $meta_p_clave }}">
    @endif

    @if (!empty($meta_descripcion))
        <meta name="description" content="{{ $meta_descripcion }}">
    @endif

    @php
        $configuracionSistemaApp = App\Models\ConfiguracionSistemaModel::getSingle();
    @endphp

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ $configuracionSistemaApp->getFavicon() }}">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/plugins/magnific-popup/magnific-popup.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('style')

    <style>
        .btn-agregar-listadeseos::before{
            content: '\f233' !important;
        }
    </style>
</head>

<body>
    <div class="page-wrapper">

        @include('layouts._header')

        @yield('content')

        @include('layouts._footer')

    </div>

    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    @include('layouts._mobile_menu')

    <div class="mobile-menu-overlay"></div>

    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin"
                                        role="tab" aria-controls="signin" aria-selected="true">Iniciar sesión</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register"
                                        role="tab" aria-controls="register" aria-selected="false">Registrarse</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel"
                                    aria-labelledby="signin-tab">
                                    <form action="" method="POST" id="enviarFormularioLogin">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="singin-email">Correo electrónico <span
                                                    style="color: red;">*</span></label>
                                            <input type="text" class="form-control" id="singin-email" name="email"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <label for="singin-password">Contraseña <span
                                                    style="color: red;">*</span></label>
                                            <input type="password" class="form-control" id="singin-password"
                                                name="password" required>
                                        </div>

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>Entrar</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="is_remember"
                                                    id="signin-remember">
                                                <label class="custom-control-label"
                                                    for="signin-remember">Recuerdame</label>
                                            </div>

                                            <a href="{{ url('cambiar-contrasena') }}" class="forgot-link">Olvidaste tu
                                                contraseña?</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="register" role="tabpanel"
                                    aria-labelledby="register-tab">
                                    <form action="" method="POST" id="enviarFormularioRegistro">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="register-name">Nombre <span
                                                    style="color: red">*</span></label>
                                            <input type="text" class="form-control" id="register-name"
                                                name="name" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="register-email">Tu correo electrónico <span
                                                    style="color: red">*</span></label>
                                            <input type="email" class="form-control" id="register-email"
                                                name="email" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="register-password">Contraseña <span
                                                    style="color: red">*</span></label>
                                            <input type="password" class="form-control" id="register-password"
                                                name="password" required>
                                        </div>

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>Registrase</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="register-policy" required>
                                                <label class="custom-control-label" for="register-policy">Acepto la <a
                                                        href="#">política y provacidad.</a> *</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .form-footer -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row no-gutters bg-white newsletter-popup-content">
                    <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                        <div class="banner-content text-center">
                            <img src="assets/images/popup/newsletter/logo.png" class="logo" alt="logo"
                                width="60" height="15">
                            <h2 class="banner-title">get <span>25<light>%</light></span> off</h2>
                            <p>Subscribe to the Molla eCommerce newsletter to receive timely updates from your favorite
                                products.</p>
                            <form action="#">
                                <div class="input-group input-group-round">
                                    <input type="email" class="form-control form-control-white"
                                        placeholder="Your Email Address" aria-label="Email Adress" required>
                                    <div class="input-group-append">
                                        <button class="btn" type="submit"><span>go</span></button>
                                    </div><!-- .End .input-group-append -->
                                </div><!-- .End .input-group -->
                            </form>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                                <label class="custom-control-label" for="register-policy-2">Do not show this popup
                                    again</label>
                            </div><!-- End .custom-checkbox -->
                        </div>
                    </div>
                    <div class="col-xl-2-5col col-lg-5 ">
                        <img src="assets/images/popup/newsletter/img-1.jpg" class="newsletter-img" alt="newsletter">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Plugins JS File -->
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.hoverIntent.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ url('assets/js/superfish.min.js') }}"></script>
    <script src="{{ url('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Main JS File -->
    <script src="{{ url('assets/js/main.js') }}"></script>

    <script>
        $('body').delegate('#enviarFormularioRegistro', 'submit', function(e) {
            e.preventDefault()

            $.ajax({
                type: "POST",
                url: "{{ url('registro') }}",
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {
                    alert(data.message)
                    if (data.status == true) {
                        location.reload()
                    }
                },
                error: function(data) {}
            });
        })

        $('body').delegate('#enviarFormularioLogin', 'submit', function(e) {
            e.preventDefault()

            $.ajax({
                type: "POST",
                url: "{{ url('login') }}",
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {
                    if (data.status == true) {
                        location.reload()
                    } else {
                        alert(data.message)
                    }
                },
                error: function(data) {}
            });
        })

        $('body').delegate('.agregar_a_la_lista_de_deseos', 'click', function(e) {
            var producto_id = $(this).attr('id')
            $.ajax({
                type: "POST",
                url: "{{ url('agregar_a_la_lista_de_deseos') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    producto_id: producto_id
                },
                dataType: "json",
                success: function(data) {
                    if (data.esta_en_la_lista == 0) {
                        $('.btn-agregar-listadeseos' + producto_id).removeClass('btn-agregar-listadeseos')
                    } else {
                        $('.btn-agregar-listadeseos' + producto_id).addClass('btn-agregar-listadeseos')
                    }
                }
            });
        })
    </script>

    @yield('script')
</body>

</html>
