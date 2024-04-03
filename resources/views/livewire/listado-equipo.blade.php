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
                        <td class="border px-4 py-2">{{ $equipo->usuario ? $equipo->usuario->nombre : 'Equino no asignado' }}</td>
                        <td class="border px-4 py-2">{{ $equipo->condicion ? $equipo->condicion->condicion : 'N/A' }}
                        </td>
                        <td class="border px-4 py-2">{{ $equipo->tipo ? $equipo->tipo->tipo : 'N/A' }}
                        <td class="border px-4 py-2">{{ $equipo->nombre }}</td>
                        <td class="border px-4 py-2">{{ $equipo->serial }}</td>
                        <td class="border px-4 py-2">{{ \DateTime::createFromFormat('Y-m-d H:i:s', $equipo->compra)->format('Y-m-d') }}</td>
                        <td class="border px-4 py-2">{{ \DateTime::createFromFormat('Y-m-d H:i:s', $equipo->garatiaInicial)->format('Y-m-d') }}</td>
                        <td class="border px-4 py-2">{{ \DateTime::createFromFormat('Y-m-d H:i:s', $equipo->garatiaFinal)->format('Y-m-d') }}</td>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $equipos->links() }}
    </div>
</div>
