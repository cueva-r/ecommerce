<footer class="footer footer-dark">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="widget widget-about">
                        <img src="{{ $configuracionSistemaApp->getLogo() }}" class="footer-logo" alt="Footer Logo"
                            width="150" height="25">
                        <p>{{ $configuracionSistemaApp->descripcion_pie_pagina }}</p>

                        <div class="social-icons">
                            @if (!empty($configuracionSistemaApp->facebook_link))
                                <a href="{{ $configuracionSistemaApp->facebook_link }}" class="social-icon"
                                    title="Facebook" target="_blank">
                                    <i class="icon-facebook-f"></i>
                                </a>
                            @endif

                            @if (!empty($configuracionSistemaApp->twitter_link))
                                <a href="{{ $configuracionSistemaApp->twitter_link }}" class="social-icon" title="Twitter"
                                    target="_blank">
                                    <i class="icon-twitter"></i>
                                </a>
                            @endif

                            @if (!empty($configuracionSistemaApp->instagram_link))
                                <a href="{{ $configuracionSistemaApp->instagram_link }}" class="social-icon" title="Instagram"
                                    target="_blank">
                                    <i class="icon-instagram"></i>
                                </a>
                            @endif

                            @if (!empty($configuracionSistemaApp->github_link))
                                <a href="{{ $configuracionSistemaApp->github_link }}" class="social-icon" title="GitHub" target="_blank">
                                    <i class="icon-github"></i>
                                </a>
                            @endif

                            @if (!empty($configuracionSistemaApp->linkedin_link))
                                <a href="{{ $configuracionSistemaApp->linkedin_link }}" class="social-icon" title="Linkedin"
                                    target="_blank">
                                    <i class="icon-linkedin"></i>
                                </a>
                            @endif

                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Enlaces útiles</h4>

                        <ul class="widget-list">
                            <li><a href="{{ url('') }}">Inicio</a></li>
                            <li><a href="{{ url('sobre-nosotros') }}">Sobre nosotros</a></li>
                            <li><a href="{{ url('blog') }}">Blog</a></li>
                            <li><a href="{{ url('faq') }}">Preguntas frecuentes</a></li>
                            <li><a href="{{ url('contactenos') }}">Contáctenos</a></li>

                            @if (!empty(Auth::check()))
                                <li><a href="{{ url('admin/cerrar-sesion') }}">Cerar sesión</a></li>
                            @else
                                <li><a href="#signin-modal" data-toggle="modal">Iniciar sesión</a></li>
                            @endif

                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Servicio al Cliente</h4>

                        <ul class="widget-list">
                            <li><a href="{{ url('metodo-pago') }}">Métodos de pago</a></li>
                            <li><a href="{{ url('garantias') }}">¡Garantía de devolución del dinero!</a></li>
                            <li><a href="{{ url('devoluciones') }}">Devoluciones</a></li>
                            <li><a href="{{ url('envios') }}">Envíos</a></li>
                            <li><a href="{{ url('terminos-condiciones') }}">Terminos y condiciones</a></li>
                            <li><a href="{{ url('politica-privacidad') }}">Política y privacidad</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        @if (!empty(Auth::check()))
                            <ul class="widget-list">
                                <li><a href="{{ url('cliente/dashboard') }}">Mi cuenta</a></li>
                            <ul>
                            @else
                                <ul class="widget-list">
                                    <li><a href="#signin-modal" data-toggle="modal">Mi cuenta</a></li>
                                <ul>
                        @endif

                        <ul class="widget-list">
                            <li><a href="{{ url('carrito') }}">Ver carrito</a></li>
                            <li><a href="{{ url('mi-lista-de-deseos') }}">Mi lista de deseos</a></li>
                            <li><a href="{{ url('carrito') }}">Ver carrito</a></li>
                            <li><a href="{{ url('pagar') }}">Pagar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p class="footer-copyright">Copyright © {{ date('Y') }} {{ $configuracionSistemaApp->nombre_sitioweb }}. Todos los derechos reservados.</p>
            <figure class="footer-payments">
                <img src="{{ $configuracionSistemaApp->getPiePaginaIcono() }}" alt="Payment methods" width="272" height="20">
            </figure>
        </div>
    </div>
</footer>
