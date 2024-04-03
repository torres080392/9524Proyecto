<div class="container mx-auto p-6">

    <div class="row">
        <div class="form-group col-md-10">
            <label for="search">Buscar</label>
            <div class="flex justify-end">
                <input wire:model="search" wire:keyup="searchProduct" type="text"
                    class="border-b border-gray-300 rounded-t-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 w-full py-2 px-4 text-sm focus:outline-none"
                    placeholder="Ingresa el nombre de la persona a buscar  ">
            </div>
            @if ($showlist)
                <div class="mt-3">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Id
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/4">
                                    Apellido
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Documento
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Telefono
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Correo
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Direccion
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    cargo
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Area
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Estado
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($results))
                                @forelse ($results as $result)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-700">
                                            {{ $result->id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-700">
                                            {{ $result->nombre }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{ $result->apellido }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{ $result->documento }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{ $result->telefono }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{ $result->correo }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{ $result->direccion }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-700">
                                            {{ $result->usuario ? 'N/N' :  $result->cargo->cargo }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-700">
                                            {{ $result->usuario ? 'N/N' :  $result->area->area }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-700">
                                            {{ $result->usuario ? 'N/N' :  $result->estado->estado }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            <button wire:click="abrirModalAct({{ $result->id }})"
                                                class="px-4 py-2 btn btn-sm btn-warning">Modificar</button>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            <button wire:click="abrirModal({{ $result->id }})"
                                                class="px-4 py-2 bg-dark text-white rounded-md shadow-md hover:bg-black">Eliminar</button>
                                        </td>


                                    </tr>


                                @empty
                                    <p>No hay registros que coincidan con esa busqueda</p>
                                @endforelse

                            @endif
                        </tbody>
                    </table>
                </div>
            @endif
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
                        ¿Estás seguro de que deseas eliminar el usuario con el documento {{ $usuarioId->documento }}
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
                                <input wire:model="nombre" value="{{ $usuarioSeleccionado->nombre }}" type="text"
                                    id="nombre" name="nombre" class="form-control" required>
                                @error('nombre')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido:</label>
                                <input wire:model="apellido" value="{{ $usuarioSeleccionado->apellido }}"
                                    id="apellido" name="apellido" class="form-control" required>
                                @error('apellido')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="documento" class="form-label">Documento:</label>
                                <input wire:model='documento' value="{{ $usuarioSeleccionado->documento }}"
                                    type="text" id="documento" name="documento" class="form-control" required>
                                @error('documento')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono:</label>
                                <input wire:model="telefono" value="{{ $usuarioSeleccionado->telefono }}"
                                    type="text" id="telefono" name="telefono" class="form-control" required>
                                @error('telefono')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo:</label>
                                <input wire:model="correo" value="{{ $usuarioSeleccionado->correo }}" type="text"
                                    id="correo" name="correo" class="form-control" required>
                                @error('correo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="direccion" class="form-label">Teléfono:</label>
                                <input wire:model="direccion" value="{{ $usuarioSeleccionado->direccion }}"
                                    type="text" id="direccion" name="direccion" class="form-control" required>
                                @error('direccion')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-9 mb-6">

                                <label for="cargo" class="form-label">Cargo actual:</label>
                                <select wire:model="cargo_id" id="cargo" name="cargo" class="form-select"
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


    <!-- Modal de mensajes -->

    @if ($modalMensajeUsuario)
        <div class="modal fade show" tabindex="-1" role="dialog" style="display: block;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Mensaje de éxito</h5>
                    </div>
                    <div class="modal-body">
                        <div>
                            @if (session()->has('message'))
                                <div class="btn btn-sm btn-warning" role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"
                            wire:click="cerrarModalMensaje">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
