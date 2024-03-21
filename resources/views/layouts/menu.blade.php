<ul class="nav nav-tabs">

    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">95/24Colombia SAS</a>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
            aria-expanded="false">Inicio</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ Route('dashboard') }}">Menu principal</a></li>

        </ul>
    </li>


    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
            aria-expanded="false">Equipos</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ Route('listado.index') }}">Listado</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="{{ Route('equipos.index') }}">Asignar equipo</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="{{ Route('buscar.equipo') }}">Buscador</a></li>

        </ul>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
            aria-expanded="false">Personas</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ Route('listadoUsuarios.index') }}">Listado</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="{{ Route('usuario-index') }}">Crear usuario</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="{{ Route('buscar.persona') }}">Buscador</a></li>


        </ul>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
            aria-expanded="false">Usuarios del sistema</a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ Route('listadoUsuarios.index') }}">Listado</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="{{ Route('user-index') }}">Registrar usuario</a></li>
            </div>


            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="{{ Route('buscar.persona') }}">Buscador</a></li>


        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" aria-disabled="true">Usuario:{{ Auth::user()->name }}</a>
    </li>
</ul>
