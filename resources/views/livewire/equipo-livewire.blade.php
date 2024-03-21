
<div class="container-fluid mx-auto p-0">
    <div class="d-flex flex-wrap">
        <div class="w-50 p-4">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        <span class="block sm:inline">{{ session('message') }}</span>
                    </div>
                @endif
            </div>
            <form wire:submit.prevent="crearEquipo" enctype="multipart/form-data" class="space-y-3">
                <!-- Tu formulario aquí -->
                <h4 class="text-xl font-bold">En este formulario podrá asignarle un equipo a una persona</h4>
        <div class="row">
            <div class="col-md-6">
                <label for="usuario" class="form-label">Persona:</label>
                <select wire:model="usuario_id" id="usuario" name="usuario" class="form-select p-2 border rounded" required>
                    <option value="">Seleccionar persona</option>
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                    @endforeach
                </select>
                @error('usuario_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="condicion_id" class="form-label">Condición:</label>
                <select wire:model="condicion_id" id="condicion" class="form-select p-2 border rounded">
                    <option value="">Seleccionar la condición</option>
                    @foreach ($condicions as $condicion)
                        <option value="{{ $condicion->id }}">{{ $condicion->condicion }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="tipo_id" class="form-label">Tipo:</label>
                <select wire:model="tipo_id" id="tipo" class="form-select p-2 border rounded">
                    <option value="">Seleccionar el tipo</option>
                    @foreach ($tipos as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre:</label>
                <input wire:model="nombre" type="text" id="nombre" name="nombre" class="form-control p-2 border rounded" required>
                @error('nombre')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="serial" class="form-label">Serial:</label>
                <input wire:model="serial" id="serial" name="serial" rows="3" class="form-control p-2 border rounded" required></input>
                @error('serial')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="compra" class="form-label">Fecha de compra:</label>
                <input wire:model='compra' type="date" id="compra" name="compra" class="form-control p-2 border rounded" required>
                @error('compra')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="garatiaInicial" class="form-label">Fecha inicio garantía:</label>
                <input wire:model="garatiaInicial" type="date" id="garatiaInicial" name="garatiaInicial" class="form-control p-2 border rounded" required>
                @error('garatiaInicial')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="garatiaFinal" class="form-label">Fecha final de garantía:</label>
                <input wire:model="garatiaFinal" type="date" id="garatiaFinal" name="garatiaFinal" class="form-control p-2 border rounded" required>
                @error('garatiaFinal')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div></br>
        <div class="row justify-content-center">
            <div class="col-md-3 mb-3">
                <button type="submit" class="btn btn-primary w-100">
                    Crear
                </button>
            </div>
        </div>
            </form>
        </div>
        

        <div class="w-50 p-4">
            <div class="text-center">
                <h4>Listado de equipos</h4>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Condición</th>
                            <th>Tipo</th>
                            <th>Nombre</th>
                            <th>Serial</th>
                            <th>Comprado</th>
                            <th>Garantia Inicial </th>
                            <th>Garantia Final</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipos as $equipo)
                            <tr>
                                <td>{{ $equipo->id }}</td>
                                <td>{{ $equipo->usuario ? $equipo->usuario->nombre : 'Equipo no asignado' }}</td>
                                <td>{{ $equipo->condicion ? $equipo->condicion->condicion : 'N/A' }}</td>
                                <td>{{ $equipo->tipo ? $equipo->tipo->tipo : 'N/A' }}</td>
                                <td>{{ $equipo->nombre }}</td>
                                <td>{{ $equipo->serial }}</td>
                                <td>{{ \DateTime::createFromFormat('Y-m-d H:i:s', $equipo->compra)->format('Y-m-d') }}</td>
                                <td>{{ \DateTime::createFromFormat('Y-m-d H:i:s', $equipo->garatiaInicial)->format('Y-m-d') }}</td>
                                <td>{{ \DateTime::createFromFormat('Y-m-d H:i:s', $equipo->garatiaFinal)->format('Y-m-d') }}</td>
                                <td>
                                    <button wire:click="abrirModalAct({{ $equipo->id }})" class="btn btn-sm btn-warning">Modificar</button>
                                </td>
                                <td>
                                    <button wire:click="abrirModal({{ $equipo->id }})" class="btn btn-sm btn-danger">Eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
           
                <p class="mb-0">Total de equipos {{ $totalEquipos }}</p>
          
            <div class="mt-4">
                {{ $equipos->links() }}
            </div>
        </div>
    </div>





        <!-- Modal de confirmación de eliminación -->
@if ($modalAbierto)
<div class="modal fade show" tabindex="-1" role="dialog" style="display: block;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmar Eliminación</h5>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar el equipo con el serial :: {{ $usuarioId->serial }}
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
                <h5 class="modal-title">Actualizar datos del equipo</h5>
                <button type="button" class="btn-close" aria-label="Close"
                    wire:click="cerrarModalAct"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update({{ $equipoSeleccionado->id }})"
                    enctype="multipart/form-data">
                    <div class="col-md-9 mb-6">
                        <label for="usuario" class="form-label">Usuario:</label>
                        <select wire:model="usuario_id" id="usuario" name="usuario" class="form-select"
                            required>
                            <option value="">Seleccionar un  usuario</option>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                            @endforeach
                        </select>
                        @error('usuario_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-9 mb-6">
                        <label for="condicion_id" class="form-label">Condicion del equipo:</label>
                        <select wire:model="condicion_id" id="condicion" class="form-select">
                            <option value="">Selecione una condicion</option>
                            @foreach ($condicions as $condicion)
                                <option value="{{ $condicion->id }}">{{ $condicion->condicion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-9 mb-6">
                        <label for="tipo_id" class="form-label">Tipo
                         :</label>
                        <select wire:model="tipo_id" id="estado" class="form-select">
                            <option value="">Seleccione un tipo</option>
                            @foreach ($tipos as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nombre"
                            class="form-label">Nombre:</label>
                        <input wire:model="nombre" value="{{ $equipoSeleccionado->nombre }}" type="text" id="nombre"
                            name="nombre" class="form-control" required>
                        @error('nombre')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="serial"
                            class="form-label">Serial:</label>
                        <input wire:model="serial" value="{{ $equipoSeleccionado->serial }}" id="serial" name="serial" class="form-control"
                            required>
                        @error('serial')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="compra"
                            class="form-label">Fecha de compra:</label>
                        <input wire:model='compra' value="{{ \DateTime::createFromFormat('Y-m-d H:i:s', $equipoSeleccionado->compra)->format('Y-m-d') }}" type="date" id="compra" name="compra"
                            class="form-control" required>
                        @error('compra')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="garatiaInicial"
                            class="form-label">Inicio de garantia:</label>
                        <input wire:model="garatiaInicial" value="{{ \DateTime::createFromFormat('Y-m-d H:i:s', $equipoSeleccionado->garatiaInicial)->format('Y-m-d') }}" type="date" id="garatiaInicial" name="garatiaInicial"
                            class="form-control" required>
                        @error('garatiaInicial')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="garatiaFinal"
                            class="form-label">Final de garantia:</label>
                        <input wire:model="garatiaFinal" value="{{ \DateTime::createFromFormat('Y-m-d H:i:s', $equipoSeleccionado->garatiaFinal)->format('Y-m-d') }}" type="date" id="garatiaFinal" name="garatiaFinal"
                            class="form-control" required>
                        @error('garatiaFinal')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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
