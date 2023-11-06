<li class="nav-item">
    <a href="{{ route('users.index') }}" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>Usuarios</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('recepcion_documentos.busqueda') }}" class="nav-link {{ request()->is('busqueda*') ? 'active' : '' }}">
        <i class="nav-icon fa fa-qrcode"></i>
        <p>Búsqueda por QR</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('recepcion_documentos.index') }}" class="nav-link {{ request()->is('recepcion_documentos*') ? 'active' : '' }}">
        <i class="nav-icon fa fa-clipboard-list"></i>
        <p>Recepción de Documentos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('derivar_documentos.index') }}" class="nav-link {{ request()->is('derivar_documentos*') ? 'active' : '' }}">
        <i class="nav-icon fa fa-list"></i>
        <p>Derivar Documentos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('salida_documentos.index') }}" class="nav-link {{ request()->is('salida_documentos*') ? 'active' : '' }}">
        <i class="nav-icon fa fa-sign-out-alt"></i>
        <p>Salida de Documentos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('clasificacion_documentos.index') }}" class="nav-link {{ request()->is('clasificacion_documentos*') ? 'active' : '' }}">
        <i class="nav-icon fa fa-list-alt"></i>
        <p>Clasificación de Documentos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('areas.index') }}" class="nav-link {{ request()->is('areas*') ? 'active' : '' }}">
        <i class="nav-icon fa fa-list"></i>
        <p>Áreas</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('institucions.index') }}" class="nav-link {{ request()->is('institucions*') ? 'active' : '' }}">
        <i class="nav-icon fa fa-list"></i>
        <p>Institución</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('razon_social.index') }}"
        class="nav-link {{ request()->is('razon_social*') ? 'active' : '' }}">
        <i class="nav-icon fa fa-hospital"></i>
        <p>Razón social</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('reportes.index') }}" class="nav-link {{ request()->is('reportes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-file-alt"></i>
        <p>Reportes</p>
    </a>
</li>
