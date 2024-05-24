<aside class="col-md-4 col-lg-3">
    <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
        <li class="nav-item">
            <a href="{{ url('cliente/dashboard') }}"
                class="nav-link @if (Request::segment(2) == 'dashboard') active @endif ">Dashboard</a>
        </li>

        <li class="nav-item">
            <a href="{{ url('cliente/pedidos') }}"
                class="nav-link @if (Request::segment(2) == 'pedidos') active @endif ">Pedidos</a>
        </li>

        <li class="nav-item">
            <a href="{{ url('cliente/editar-perfil') }}"
                class="nav-link @if (Request::segment(2) == 'editar-perfil') active @endif ">Editar perfil</a>
        </li>

        <li class="nav-item">
            <a href="{{ url('cliente/cambiar-contrasena') }}"
                class="nav-link @if (Request::segment(2) == 'cambiar-contrasena') active @endif ">Cambiar contraseña</a>
        </li>

        <li class="nav-item">
            @php
                $getUnreadNotificationsCount = App\Models\NotificacionModel::getUnreadNotificationsCount(Auth::user()->id);
            @endphp
            <a href="{{ url('cliente/notificaciones') }}"
                class="nav-link @if (Request::segment(2) == 'notificaciones') active @endif ">Notificaciones ({{ $getUnreadNotificationsCount }})</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/cerrar-sesion') }}">Cerrar sesión</a>
        </li>
    </ul>
</aside>
