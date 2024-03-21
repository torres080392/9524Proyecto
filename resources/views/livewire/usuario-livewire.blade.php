<div class="container mt-0">
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <div class="row">
        <!-- Formulario -->
        <div class="col-md-6 mb-3">
            <form wire:submit.prevent="crearUsuario" enctype="multipart/form-data" class="space-y-6">
                <!-- Contenido del formulario omitido por brevedad -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input wire:model="nombre" type="text" id="nombre" name="nombre" class="form-control" required>
                            @error('nombre')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="apellido" class="form-label">Apellido:</label>
                            <input wire:model="apellido" id="apellido" name="apellido" class="form-control" required>
                            @error('apellido')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="documento" class="form-label">Documento:</label>
                            <input wire:model='documento' type="text" id="documento" name="documento" class="form-control" required>
                            @error('documento')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telefono" class="form-label">Telefono:</label>
                            <input wire:model="telefono" type="text" id="telefono" name="telefono" class="form-control" required>
                            @error('telefono')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="correo" class="form-label">Correo:</label>
                            <input wire:model="correo" type="email" id="correo" name="correo" class="form-control" required>
                            @error('correo')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="direccion" class="form-label">Direccion:</label>
                            <input wire:model="direccion" type="text" id="direccion" name="direccion" class="form-control" required>
                            @error('direccion')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cargo" class="form-label">Cargo:</label>
                            <select wire:model="cargo_id" id="cargo" name="cargo" class="form-select" required>
                                <option value="">Seleccionar cargo</option>
                                @foreach ($cargos as $cargo)
                                    <option value="{{ $cargo->id }}">{{ $cargo->cargo }}</option>
                                @endforeach
                            </select>
                            @error('cargo_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="area_id" class="form-label">Área:</label>
                            <select wire:model="area_id" id="area" class="form-select">
                                <option value="">Selecciona un área</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}">{{ $area->area }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="estado_id" class="form-label">Estado:</label>
                            <select wire:model="estado_id" id="estado" class="form-select">
                                <option value="">Selecciona un estado</option>
                                @foreach ($estados as $estado)
                                    <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="row justify-content-center">
                    <div class="col-md-3 mb-3">
                        <button type="submit" class="btn btn-primary w-100">
                            Crear
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Listado -->
        <div class="col-md-6">
            <div class="mt-6">

                <div class="text-center">
                    <h4>Listado de personas</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <!-- Contenido del listado omitido por brevedad -->
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Documento</th>
                                <th>Estado</th>
                                <th>Actualizar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->id }}</td>
                                    <td>{{ $usuario->nombre }}</td>
                                    <td>{{ $usuario->apellido }}</td>
                                    <td>{{ $usuario->documento }}</td>
                                    <td>{{ $usuario->estado ? $usuario->estado->estado : 'N/A' }}</td>
                                    <td><button wire:click="abrirModalAct({{ $usuario->id }})"
                                            class="btn btn-sm btn-warning">Modificar </button></td>
                                            
                                    <td> <button wire:click="abrirModal({{ $usuario->id }})"
                                            class="btn btn-sm btn-dark">Eliminar</button></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p class="mb-1">Total de personas :: {{ $totalPersonas }}</p>
                </div>
                <div class="mt-4">
                    {{ $usuarios->links() }}
                </div>
            </div>
        </div>
        <!-- Modal de confirmación de eliminacion -->
    <!-- Modal de confirmación de eliminación -->
@if ($modalAbierto)
<div class="modal fade show" tabindex="-1" role="dialog" style="display: block;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmar Eliminación</h5>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar el usuario con el documento  {{ $usuarioId->documento }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        wire:click="cerrarModal">Cancelar
                </button>
                <button type="button" class="btn btn-danger"
                        wire:click="eliminarUsuario({{ $usuarioId->id }})">Eliminar
                </button>
            </div>
        </div>
    </div>
</div>
@endif




        <!-- Modal de confirmación de actualizacion -->

        @if ($modalActualizar)
        <div class="modal fade show" tabindex="-1" role="dialog" style="display: block;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Actualizar datos de la persona</h5>
                        <button type="button" class="btn-close" aria-label="Close"
                            wire:click="cerrarModalAct"></button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="update({{ $usuarioSeleccionado->id }})"
                            enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input wire:model="nombre" value="{{ $usuarioSeleccionado->nombre }}" type="text" id="nombre" name="nombre" class="form-control" required>
                                @error('nombre')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="apellido"
                                    class="form-label">Apellido:</label>
                                <input wire:model="apellido" value="{{ $usuarioSeleccionado->apellido }}" id="apellido" name="apellido" class="form-control"
                                    required>
                                @error('apellido')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="documento"
                                    class="form-label">Documento:</label>
                                <input wire:model='documento' value="{{ $usuarioSeleccionado->documento }}" type="text" id="documento" name="documento"
                                    class="form-control" required>
                                @error('documento')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="telefono"
                                    class="form-label">Teléfono:</label>
                                <input wire:model="telefono" value="{{ $usuarioSeleccionado->telefono }}" type="text" id="telefono" name="telefono"
                                    class="form-control" required>
                                @error('telefono')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="correo"
                                    class="form-label">Correo:</label>
                                <input wire:model="correo" value="{{ $usuarioSeleccionado->correo }}" type="text" id="correo" name="correo"
                                    class="form-control" required>
                                @error('correo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="direccion"
                                    class="form-label">Teléfono:</label>
                                <input wire:model="direccion" value="{{ $usuarioSeleccionado->direccion }}" type="text" id="direccion" name="direccion"
                                    class="form-control" required>
                                @error('direccion')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-9 mb-6">
                                
                                <label for="cargo" class="form-label">Cargo actual:</label>
                                <select wire:model="cargo_id"  id="cargo" name="cargo" class="form-select"
                                    required>
                                    <option value="">Seleccionar cargo</option>
                                    @foreach ($cargos as $cargo)
                                        <option value="{{ $cargo->id }}">{{ $cargo->cargo }}</option>
                                    @endforeach
                                </select>
                                @error('cargo_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-9 mb-6">
                               
                                <label for="area_id" class="form-label">Área actual:</label>
                                <select wire:model="area_id" id="area" class="form-select">
                                    <option value="">Selecciona un área</option>
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->area }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-9 mb-6">
                               
                                <label for="estado_id" class="form-label">Estado
                                    actual:</label>
                                <select wire:model="estado_id" id="estado" class="form-select">
                                    <option value="">Selecciona un estado</option>
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Agrega otros campos aquí -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                <button type="button" class="btn btn-secondary"
                                    wire:click="cerrarModalAct">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
