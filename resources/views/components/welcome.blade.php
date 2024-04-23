<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Inventario de tecnologia 95/24Colombia SAS
    </h1>

</div>
 
<!-- Aquí van los cards de estadisticas basicas-->
<div class="d-flex flex-wrap container mx-auto px-10 ">
    
    <livewire:equipo-estadistica />
    <livewire:persona-estadistica />
    <livewire:factura-estadistica />
    <!-- Aquí van los demás elementos de la tarjeta -->
  </div>
  


<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
    <div>
        <div class="flex items-center">


        </div>

      
                
            
            <div id="lista-cursos" class="container mx-auto px-10">
                    <div class="flex flex-wrap -mx-12">
                        <div class="w-full md:w-1/2 lg:w-1/1 px-4 mb-8">
                            <!-- Contenido del primer elemento -->
                            <div class="card bg-white rounded-lg shadow-lg">
                                <img src="{{ asset('storage/images/usuarios.png') }}" alt="Usuarios" class="w-full h-56 object-cover rounded-t-lg">
                                <div class="p-6">
                                    <h4 class="text-xl font-bold mb-2">Personas</h4>
                                    <a href="{{ route('usuario-index') }}" class="block w-full px-4 py-2 bg-green-500 text-white text-center rounded-md shadow-md hover:bg-green-600">Gestionar</a>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 lg:w-1/1 px-4 mb-8">
                            <!-- Contenido del segundo elemento -->
                            <div class="card bg-white rounded-lg shadow-lg">
                                <img src="{{ asset('storage/images/equipos.jpg') }}" alt="Equipos" class="w-full h-56 object-cover rounded-t-lg">
                                <div class="p-6">
                                    <h4 class="text-xl font-bold mb-2"> Equipos</h4>
                                    <a href="{{ route('equipos.index') }}" class="block w-full px-4 py-2 bg-green-500 text-white text-center rounded-md shadow-md hover:bg-green-600">Gestionar</a>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 lg:w-1/1 px-4 mb-8">
                            <!-- Contenido del tercer elemento -->
                            <div class="card bg-white rounded-lg shadow-lg">
                                <img src="{{ asset('storage/images/users.png') }}" alt="Usuarios" class="w-full h-56 object-cover rounded-t-lg">
                                <div class="p-6">
                                    <h4 class="text-xl font-bold mb-2">Usuarios</h4>
                                    <a href="{{ route('user-index') }}" class="block w-full px-4 py-2 bg-green-500 text-white text-center rounded-md shadow-md hover:bg-green-600">Gestionar</a>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 lg:w-1/1 px-4 mb-8">
                            <!-- Contenido del cuarto elemento -->
                            <div class="card bg-white rounded-lg shadow-lg">
                                <img src="{{ asset('storage/images/faturacion.jpg') }}" alt="Usuarios" class="w-full h-56 object-cover rounded-t-lg">
                                <div class="p-6">
                                    <h4 class="text-xl font-bold mb-2">Facturas</h4>
                                    <a href="{{ route('factura-index') }}" class="block w-full px-4 py-2 bg-green-500 text-white text-center rounded-md shadow-md hover:bg-green-600">Gestionar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
                
                
                
                        <!-- Repite este patrón para las otras imágenes y enlaces -->
                
           


            </div>

            <div>
                <div class="flex items-center">


                </div>

                <div>




                </div>
            </div>

        </div>
    </div>
</div>
