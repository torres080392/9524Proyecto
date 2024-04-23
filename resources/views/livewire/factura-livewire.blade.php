<div class="container mt-0">
    <div class="container">
        <div class="row">
            <!-- Formulario -->
            <div class="col-md-6 mb-3">
                <form wire:submit.prevent="crearTarea" enctype="multipart/form-data" class="space-y-6">
                    <!-- Contenido del formulario -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="proveedor_id" class="form-label">Proveedor:</label>
                                <select wire:model="proveedor_id" id="proveedor" class="form-select">
                                    <option value="">Selecciona un Proveedor</option>
                                    @foreach ($proveedores as $proveedor)
                                        <option value="{{ $proveedor->id }}">{{ $proveedor->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="numero_factura" class="form-label">Factura #:</label>
                                <input wire:model="numero_factura" id="numero_factura" name="numero_factura" class="form-control" required>
                                @error('numero_factura')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="fecha" class="form-label">Fecha de factura:</label>
                                <input wire:model='fecha' value="" type="date"
                                    name="fecha" class="form-control" required>
                                @error('fecha')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fecha_limite" class="form-label">Fecha Limite:</label>
                                <input wire:model='fecha_limite' value="" type="date"
                                    name="fecha_final" class="form-control" required>
                                @error('fecha_limite')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <select wire:model="iva" id="iva" name="iva" class="form-select" wire:change="calcularTotal">
                                        <option selected>Selecione IVA</option>
                                        <option value="0.19">19%</option>
                                        <option value="0.16">16%</option>
                                        <!-- Agrega más opciones según sea necesario -->
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="descripcion" class="form-label">Descripcion:</label>
                                    <textarea wire:model="descripcion" class="form-control" rows="5" id="descripcion" name="comentarios" required></textarea>
                                    @error('descripcion')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="subtotal" class="form-label">SubTotal:</label>
                                    <input wire:model="sub_total" type="number" step="0.01" name="numero" class="form-control" id="subtotal" wire:change="calcularTotal">
                                    @error('subtotal')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="total" class="form-label">Total:</label>
                                    <input wire:model="total"  type="number" step="0.1" name="numero" class="form-control" id="total" readonly>
                                    @error('total')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                       
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



            <div class="col-md-6 mt-4">
                <div class="text-center">
                    <h4>Facturas</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
        
                                <th>Proveedor:</th>
                                <th>Factura #</th>
                                <th>Fecha Inicial </th>
                                <th>Fecha limite</th>
                                <th>Descripcion</th>
                                <th>Iva</th>
                                <th>SubTotal</th>
                                <th>Total</th>
                                <th>Pagada</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($facturas  as $factura)
                                <tr>
                            
                                    <td>{{ $factura->proveedor_id ? $factura->proveedor->name : 'No tiene proveedor'}}</td>
                                    <td>{{ $factura->numero_factura }}</td>
                                    <td class="bg-success">{{ $factura->fecha  }}</td>
                                    <td class="bg-danger">{{ $factura->fecha_limite }}</td>
                                    <td>{{ $factura->descripcion }}</td>
                                    <td>{{ $factura->iva }}</td>
                                    <td>{{ $factura->sub_total }}</td>
                                    <td>{{ $factura->total }}</td>
            

                                    <td>
                                        <button wire:click="pagar({{ $factura->id }})"
                                            class="btn  btn-success">Pagar</button>
                                    </td>
                                    <td>
                                        <button wire:click="delete({{ $factura->id }})"
                                            class="btn  btn-danger">Eliminar</button>
                                    </td>
                                    <td>
                                    

                                        <a class="btn  btn-success" href="{{ route('pfd-factura', ['id' => $factura]) }}">Descargar</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
               
                <div class="mt-4">
                    {{ $facturas->links() }}
                </div>
            </div>
        </div>
    </div>












    @if ($modalPagarFactura)
    <div class="modal fade show" tabindex="-1" role="dialog" style="display: block;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Mensaje </h5>
                </div>
                <div class="modal-body">
                    <div>
                        @if (session()->has('message'))
                        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3"
                            role="alert">
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
