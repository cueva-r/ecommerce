<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ url('public/assets/dist/img/user1-128x128.jpg') }}" alt="User Avatar"
                            class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ url('public/assets/dist/img/user8-128x128.jpg') }}" alt="User Avatar"
                            class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="{{ url('public/assets/dist/img/user3-128x128.jpg') }}" alt="User Avatar"
                            class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link">
        <img src="{{ url('public/assets/dist/img/logo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Ecommerce</span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url('public/assets/dist/img/hannah_owo.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ url('admin/dashboard') }}" class="nav-link @if (Request::segment(2) == 'dashboard') active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/admin/listar') }}" class="nav-link @if (Request::segment(2) == 'admin') active @endif">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Admin
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/clientes/listar') }}" class="nav-link @if (Request::segment(2) == 'clientes') active @endif">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Clientes
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/pedidos/listar') }}" class="nav-link @if (Request::segment(2) == 'pedidos') active @endif">
                        <i class="nav-icon fa-solid fa-check"></i>
                        <p>
                            Pedidos
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/categorias/listar') }}" class="nav-link @if (Request::segment(2) == 'categorias') active @endif"">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Categorías
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/subcategorias/listar') }}" class="nav-link @if (Request::segment(2) == 'subcategorias') active @endif">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Subategorías
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/productos/listar') }}" class="nav-link @if (Request::segment(2) == 'productos') active @endif">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            Productos
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/marcas/listar') }}" class="nav-link @if (Request::segment(2) == 'marcas') active @endif">
                        <i class="nav-icon fas fa-trademark"></i>
                        <p>
                            Marcas
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/colores/listar') }}" class="nav-link @if (Request::segment(2) == 'colores') active @endif">
                        <i class="nav-icon fas fa-palette"></i>
                        <p>
                            Colores
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/codigo_descuento/listar') }}" class="nav-link @if (Request::segment(2) == 'codigo_descuento') active @endif">
                        <i class="nav-icon fas fa-ticket-alt"></i>
                        <p>
                            Código de descuento
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/costo_envio/listar') }}" class="nav-link @if (Request::segment(2) == 'costo_envio') active @endif">
                        <i class="nav-icon fas fa-shipping-fast"></i>
                        <p>
                            Costo de envíos
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/sliders/lista') }}" class="nav-link @if (Request::segment(2) == 'sliders') active @endif">
                        <i class="nav-icon  fa-solid fa-layer-group"></i>
                        <p>
                            Sliders
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/socios/lista') }}" class="nav-link @if (Request::segment(2) == 'socios') active @endif">
                        <i class="nav-icon fa-solid fa-handshake"></i>
                        <p>
                            Socios
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/paginas/listar') }}" class="nav-link @if (Request::segment(2) == 'paginas') active @endif">
                        <i class="nav-icon fa-solid fa-book"></i>
                        <p>
                            Páginas
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/blogcategoria/listar') }}" class="nav-link @if (Request::segment(2) == 'blogcategoria') active @endif">
                        <i class="nav-icon fa-solid fa-blog"></i>
                        <p>
                            Blog categoría
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/contactenos') }}" class="nav-link @if (Request::segment(2) == 'contactenos') active @endif">
                        <i class="nav-icon fa-solid fa-address-card"></i>
                        <p>
                            Contáctenos
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/configuracion-sistema') }}" class="nav-link @if (Request::segment(2) == 'configuracion-sistema') active @endif">
                        <i class="nav-icon fa-solid fa-gear"></i>
                        <p>
                            Configuraciones
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('admin/cerrar-sesion') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                        <p>
                            Cerrar sesión
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
