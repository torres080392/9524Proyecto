<div class="container mx-auto p-6">
    <div class="row">
        <div class="form-group col-md-10">
            <label for="search">Buscar</label>
            <div class="flex justify-end">
                <input wire:model="search" wire:keyup="searchProduct" type="text"
                    class="border-b border-gray-300 rounded-t-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 w-full py-2 px-4 text-sm focus:outline-none"
                    placeholder="Ingresa el nombre del equipo ">
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
                                    Acciones
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
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                            <button wire:click="edit({{ $result->id }})" class="px-4 py-2 btn btn-sm btn-warning">Modificar</button>
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
</div>

