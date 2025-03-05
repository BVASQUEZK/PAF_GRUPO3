<!-- Barra lateral de la aplicación -->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!-- Sección de la marca (logo y nombre) -->
    <div class="sidebar-brand">
        <a href="../index.html" class="brand-link">
            <!-- Logo de la aplicación -->
            <img src="{{asset('img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
            <!-- Nombre de la aplicación -->
            <span class="brand-text fw-light">AEZSPORT</span>
        </a>
    </div>
    
    <!-- Contenedor del menú de navegación -->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <!-- Opción del Dashboard -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
                <!-- Menú desplegable de Almacén -->
                <li id="liAlmacen" class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-box-seam-fill"></i>
                        <p>Almacén <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- Submenú de Categorías -->
                        <li id="liCategoria" class="nav-item active">
                            <a id="aCategoria" href="{{route('categorias.index')}}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Categorías</p>
                            </a>
                        </li>
                        <!-- Submenú de Productos -->
                        <li class="nav-item">
                            <a id="aProducto" href="{{route('productos.index')}}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Productos</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <!-- Menú desplegable de Transacciones -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-cash-stack"></i>
                        <p>Transacciones <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- Submenú de Compras -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Compras</p>
                            </a>
                        </li>
                        <!-- Submenú de Ventas -->
                        <li class="nav-item">
                            <a href="{{ route('ventas.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Ventas</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <!-- Menú desplegable de Seguridad -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-clipboard-fill"></i>
                        <p>Seguridad <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- Submenú de Roles -->
                        <li class="nav-item">
                            <a href="../layout/unfixed-sidebar.html" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        <!-- Submenú de Usuarios -->
                        <li class="nav-item">
                            <a href="{{ route('usuarios.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <!-- Menú desplegable de Reportes -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon bi bi-table"></i>
                        <p>Reportes <i class="nav-arrow bi bi-chevron-right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- Submenú de Reporte de Ventas -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Reporte Ventas</p>
                            </a>
                        </li>
                        <!-- Submenú de Reporte de Usuarios -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Reporte Usuarios</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- menu.blade -->
