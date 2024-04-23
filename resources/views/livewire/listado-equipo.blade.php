<!-- Tabla de libros creados -->
<div class="mt-6">
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success" role="alert">
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
        @endif
    </div>
    <div class="alert" style="background-color: #FFA500;">
        <p class="mb-0">Total de equipos {{ $totalEquipos }}</p>
    </div>

    <div class="text-center">
        <h2>Listado de equipos</h4>
    </div>
    <div class="overflow-x-auto">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Usuario</th>
                    <th class="px-4 py-2">Condicion</th>
                    <th class="px-4 py-2">Tipo</th>
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">serial</th>
                    <th class="px-4 py-2">Fecha de compra</th>
                    <th class="px-4 py-2">Fecha incio garantia</th>
                    <th class="px-4 py-2">Fecha final garantia</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($equipos as $equipo)
                    <tr>
                        <td class="border px-4 py-2">{{ $equipo->id }}</td>
                        <td class="border px-4 py-2">
                            {{ $equipo->usuario ? $equipo->usuario->nombre : 'Equino no asignado' }} <button
                                wire:click="reasignar({{ $equipo->id }})"
                                class="btn btn-sm btn-warning">Reasignar</button></td>
                        <td class="border px-4 py-2">{{ $equipo->condicion ? $equipo->condicion->condicion : 'N/A' }}
                        </td>
                        <td class="border px-4 py-2">{{ $equipo->tipo ? $equipo->tipo->tipo : 'N/A' }}
                        <td class="border px-4 py-2">{{ $equipo->nombre }}</td>
                        <td class="border px-4 py-2">{{ $equipo->serial }}</td>
                        <td class="border px-4 py-2">
                            {{ \DateTime::createFromFormat('Y-m-d H:i:s', $equipo->compra)->format('Y-m-d') }}</td>
                        <td class="border px-4 py-2">
                            {{ \DateTime::createFromFormat('Y-m-d H:i:s', $equipo->garatiaInicial)->format('Y-m-d') }}
                        </td>
                        <td class="border px-4 py-2">
                            {{ \DateTime::createFromFormat('Y-m-d H:i:s', $equipo->garatiaFinal)->format('Y-m-d') }}
                        </td>
                        </td>

                    </tr>
                @endforeach
            </tbody>
            
        </table>

        
    </div>
    <div class="mt-4">
        {{ $equipos->links() }}
    </div>

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
                            <option value="">Seleccionar un usuario</option>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                            @endforeach
                        </select>
                        @error('usuario_id')
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

    

