<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>

        <form action="#" method="get" class="mobile-search">
            <label for="mobile-search" class="sr-only">Buscar</label>
            <input type="search" class="form-control" name="mobile-search" id="mobile-search"
                placeholder="Buscar aquí..." required>
            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
        </form>

        <nav class="mobile-nav">
            <ul class="mobile-menu">
                <li class="active">
                    <a href="{{ url('/') }}">Inicio</a>
                </li>
                @php
                    $getCategoriasMobil = App\Models\CategoriaModel::getRecordMenu();
                @endphp
                
                @foreach ($getCategoriasMobil as $valor_m_c)
                    @if (!empty($valor_m_c->getSubcategoria->count()))
                        <li>
                            <a href="{{ url($valor_m_c->slug) }}">{{ $valor_m_c->nombre }}</a>
                            <ul>
                                @foreach ($valor_m_c->getSubcategoria as $valor_m_sub)
                                    <li>
                                        <a href="{{ url($valor_m_c->slug . '/' . $valor_m_sub->slug) }}">{{ $valor_m_sub->nombre }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
            </ul>
        </nav>

        <div class="social-icons">
            <a href="https://www.facebook.com/ab.rico.05/?locale=es_LA" class="social-icon" target="_blank"
                title="Facebook"><i class="icon-facebook-f"></i></a>
            <a href="https://twitter.com/rico_a_2005" class="social-icon" target="_blank" title="Twitter"><i
                    class="icon-twitter"></i></a>
            <a href="https://www.instagram.com/a.rico_20/" class="social-icon" target="_blank" title="Instagram"><i
                    class="icon-instagram"></i></a>
            <a href="https://github.com/cueva-r" class="social-icon" target="_blank" title="GitHub"><i
                    class="icon-github"></i></a>
        </div>
    </div>
</div>
