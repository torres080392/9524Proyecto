<!-- Tabla de usuarios creados -->
<div class="mt-6">
    <div class="alert" style="background-color: #FFA500;">
        <p class="mb-0">Total de personas {{ $totalPersonas }}</p>
    </div>
    <div class="text-center">
        <h4>Listado de personas</h4>
    </div>
    <div class="col-lg-15">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th  scope="col">ID</th>
                    <th  scope="col">Nombre</th>
                    <th  scope="col">Apellido</th>
                    <th  scope="col">Documento</th>
                    <th  scope="col">Telefono</th>
                    <th  scope="col">Correo</th>
                    <th  scope="col">Direccion</th>
                    <th  scope="col">Cargo</th>
                    <th  scope="col">Área</th>
                    <th  scope="col">Estado</th>
                    <th  scope="col">Actualizar </th>
                    <th  scope="col" >Eliminar </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td scope="row">{{ $usuario->id }}</td>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->apellido }}</td>
                        <td>{{ $usuario->documento }}</td>
                        <td>{{ $usuario->telefono }}</td>
                        <td>{{ $usuario->correo }}</td>
                        <td>{{ $usuario->direccion }}</td>
                        <td>{{ $usuario->cargo ? $usuario->cargo->cargo : 'N/A' }}</td>
                        <td>{{ $usuario->area ? $usuario->area->area : 'N/A' }}</td>
                        <td>{{ $usuario->estado ? $usuario->estado->estado : 'N/A' }}</td>
                        <td><button wire:click="abrirModalAct({{ $usuario->id }})"
                                class="btn btn-sm btn-warning">Editar</button></td>
                        <td> <button wire:click="delete({{ $usuario->id }})"
                                class="btn btn-sm btn-dark">Eliminar</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $usuarios->links() }}
    </div>
</div>
</div>





