<div class="container mx-auto p-6">
    <div class="row">
        <div class="form-group col-md-10">
            <label for="search">Buscar</label>
            <div class="flex justify-end">
                <input wire:model="search" wire:keyup="searchProduct" type="text"
                    class="border-b border-gray-300 rounded-t-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 w-full py-2 px-4 text-sm focus:outline-none"
                    placeholder="Ingresa el serial del equipo ">
            </div>
            @if ($showlist)
                <div class="mt-3">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Id
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/4">
                                    Serial
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fecha de Compra
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fecha inicio garantia
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fecha final garantia
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Modificar
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Eliminar
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($results))
                                @foreach ($results as $result)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-700">
                                            {{ $result->id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-700">
                                            {{ $result->nombre }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{ $result->serial }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{ \DateTime::createFromFormat('Y-m-d H:i:s', $result->compra)->format('Y-m-d') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{ \DateTime::createFromFormat('Y-m-d H:i:s', $result->garatiaInicial)->format('Y-m-d') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            {{ \DateTime::createFromFormat('Y-m-d H:i:s', $result->garatiaFinal)->format('Y-m-d') }}
                                        </td>
                                        <td>
                                            <button wire:click="abrirModalAct({{ $result->id }})" class="btn btn-sm btn-warning">Modificar</button>
                                        </td>
                                        <td>
                                            <button wire:click="abrirModal({{ $result->id }})" class="btn btn-sm btn-danger">Eliminar</button>
                                        </td>
                                    </tr>
                                @endforeach
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

     <!-- Modal de mensajes -->

     @if ($modalMensaje)
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
                     <button type="button" class="btn btn-primary" data-dismiss="modal" wire:click="cerrarModalMensaje">Cerrar</button>
                 </div>
             </div>
         </div>
     </div>
 @endif
</div>

