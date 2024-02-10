<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ url('/') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                SN
            </span>
            <span class="app-brand-text menu-text fw-bold ms-2">{{ config('app.name', 'Laravel') }}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item {{ Request::is('/') ? 'active' : '' }}">
            <a href="{{ url('/') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div class="text-truncate" data-i18n="INICIO">INICIO</div>
            </a>
        </li>
        
        <li class="menu-item {{ Request::is('horarios') ? 'active' : '' }}">
            <a href="app-email.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-envelope"></i>
                <div class="text-truncate" data-i18n="Horarios">{{ __('Horarios') }}</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('estudiantes') ? 'active' : '' }}">
            <a href="{{ route('estudiantes') }}" class="menu-link">
                <i class="menu-icon tf-icons fas fa-user-circle"></i>
                <div class="text-truncate" data-i18n="Estudiantes">{{ __('Estudiantes') }}</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('profesores') ? 'active' : '' }}">
            <a href="{{ route('profesores') }}" class="menu-link">
                <i class="menu-icon tf-icons fas fa-user"></i>
                <div class="text-truncate" data-i18n="Profesores">{{ __('Profesores') }}</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('asignaturas') ? 'active' : '' }}">
            <a href="app-email.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div class="text-truncate" data-i18n="Asignaturas">{{ __('Asignaturas') }}</div>
            </a>
        </li>

        <li class="menu-item {{ Request::is('cursos') ? 'active' : '' }}">
            <a href="app-email.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-envelope"></i>
                <div class="text-truncate" data-i18n="Cursos">{{ __('Cursos') }}</div>
            </a>
        </li>

        {{-- <!-- COURIER -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div class="text-truncate" data-i18n="Courier">{{ __('Courier') }}</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="layouts-collapsed-menu.html" class="menu-link">
                        <div class="text-truncate" data-i18n="Collapsed menu">Collapsed menu</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="layouts-content-navbar.html" class="menu-link">
                        <div class="text-truncate" data-i18n="Content navbar">Content navbar</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- EMBARQUE -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-store"></i>
                <div class="text-truncate" data-i18n="Embarque">Embarque</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="../front-pages/landing-page.html" class="menu-link" target="_blank">
                        <div class="text-truncate" data-i18n="Landing">Landing</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="../front-pages/pricing-page.html" class="menu-link" target="_blank">
                        <div class="text-truncate" data-i18n="Pricing">Pricing</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Facturacion -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-store"></i>
                <div class="text-truncate" data-i18n="Facturacion">Facturacion</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="../front-pages/landing-page.html" class="menu-link" target="_blank">
                        <div class="text-truncate" data-i18n="Landing">Landing</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="../front-pages/pricing-page.html" class="menu-link" target="_blank">
                        <div class="text-truncate" data-i18n="Pricing">Pricing</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Reportes -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-store"></i>
                <div class="text-truncate" data-i18n="Reportes">Reportes</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="../front-pages/landing-page.html" class="menu-link" target="_blank">
                        <div class="text-truncate" data-i18n="Landing">Landing</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="../front-pages/pricing-page.html" class="menu-link" target="_blank">
                        <div class="text-truncate" data-i18n="Pricing">Pricing</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text" data-i18n="Administración">Administración</span>
        </li>

        <!-- Finanzas -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-store"></i>
                <div class="text-truncate" data-i18n="Finanzas">Finanzas</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="../front-pages/landing-page.html" class="menu-link" target="_blank">
                        <div class="text-truncate" data-i18n="Landing">Landing</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="../front-pages/pricing-page.html" class="menu-link" target="_blank">
                        <div class="text-truncate" data-i18n="Pricing">Pricing</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Logística -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-car"></i>
                <div class="text-truncate" data-i18n="Logística">Logística</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="app-logistics-dashboard.html" class="menu-link">
                      <div class="text-truncate" data-i18n="Logística">Logística</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="app-logistics-fleet.html" class="menu-link">
                      <div class="text-truncate" data-i18n="Traking">Traking</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text" data-i18n="Sistemas">Sistemas</span>
        </li>

        <!-- Parametros -->
        @php
            $activeRoutesParametros = [ 'cliente', 'pais', 'institucion', 'tipoInstitucion', 'medida', 'tipoEnvio', 'procedencia', 'clasificador', 'handling'];
        @endphp
        <li class="menu-item {{ in_array(Route::currentRouteName(), $activeRoutesParametros) ? 'open active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-store"></i>
                <div class="text-truncate" data-i18n="Parametros">Parametros</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('clientes') ? 'active' : '' }}">
                    <a href="{{ route('cliente') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Clientes">{{ __('Clientes') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('pais') ? 'active' : '' }}">
                    <a href="{{ route('pais') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Pais">{{ __('Pais') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('instituciones') ? 'active' : '' }}">
                    <a href="{{ route('institucion') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Institucion">{{ __('Institución') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('tipoInstituciones') ? 'active' : '' }}">
                    <a href="{{ route('tipoInstitucion') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Tipo Institucion">{{ __('Tipo Institucion') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('medidas') ? 'active' : '' }}">
                    <a href="{{ route('medida') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Medida">{{ __('Medida') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('tipoEnvios') ? 'active' : '' }}">
                    <a href="{{ route('tipoEnvio') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Tipo Envios">{{ __('Tipo Envios') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('procedencia') ? 'active' : '' }}">
                    <a href="{{ route('procedencia') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Procedencia">{{ __('Procedencia') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('clasificador') ? 'active' : '' }}">
                    <a href="{{ route('clasificador') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Clasificador">{{ __('Clasificador') }}</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::is('handling') ? 'active' : '' }}">
                    <a href="{{ route('handling') }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Handling">{{ __('Handling') }}</div>
                    </a>
                </li>
            </ul>
        </li> --}}
    </ul>
</aside>
