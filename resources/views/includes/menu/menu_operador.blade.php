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
    <a href="{{ route('institucions.index') }}" class="nav-link {{ request()->is('institucions*') ? 'active' : '' }}">
        <i class="nav-icon fa fa-list"></i>
        <p>Institución</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('reportes.index') }}" class="nav-link {{ request()->is('reportes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-file-alt"></i>
        <p>Reportes</p>
    </a>
</li>
