<?php

namespace App\Http\Livewire;

use App\Models\Factura;
use App\Models\Pago;
use App\Models\Proveedor;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class FacturaLivewire extends Component
{

    use WithPagination;
    public $proveedor_id;
    public $numero_factura;
    public $fecha;
    public $fecha_limite;
    public $iva;
    public $sub_total;
    public $total;
    public $descripcion;
    //variables para pago de factura
    public $factura_id;
    public $pagado = 'Si';
    public $pagado2 = 'No';
    public $fecha_pago = '';

    //modales
    public $modalPagarFactura = false;


    public function calcularTotal()
    {
        // Verificar si $sub_total y $iva están establecidos
        if (!is_null($this->sub_total) && !is_null($this->iva)) {
            // Realizar el cálculo del total
            $this->total = $this->sub_total * (1 + $this->iva);
        }
    }

    public function delete($id)
    {
        Factura::destroy($id);
    }

    public function crearTarea()
    {

        // Aquí puedes agregar la lógica para guardar los datos en la base de datos
        //Por ejemplo:
        Factura::create([
            'proveedor_id' => $this->proveedor_id,
            'numero_factura' => $this->numero_factura,
            'fecha' => $this->fecha,
            'iva' => $this->iva,
            'fecha_limite' => $this->fecha_limite,
            'sub_total' => $this->sub_total,
            'total' => $this->total,
            'descripcion' => $this->descripcion,

        ]);

        // Limpiar los campos después de guardar
        $this->reset();
        //modal de mensaje
        //$this->modalMensaje = true;
        // session()->flash('message', 'Equipo creado exitoxamente.');

    }

    public function pagar($id)
    { 
        // Buscar el pago asociado a la factura
        $pagoExistente = Pago::where('factura_id', $id)->first();
    
        if ($pagoExistente) {
            // Si ya existe un pago para esta factura, mostrar un mensaje de error
            session()->flash('message', 'Esta factura ya ha sido pagada anteriormente.');
        } else {
            // Si no existe un pago para esta factura, crear un nuevo registro de pago
            Pago::create([
                'factura_id' => $id,
                'pagado' => true,
                'fecha_pago' => Carbon::now(),
            ]);
    
            // Mostrar un mensaje de éxito
            session()->flash('message', 'La factura se ha pagado exitosamente.');
        }
    
        // Cierra el modal
        $this->modalPagarFactura = true;
    }

    public function cerrarModalMensaje()
    {
        $this->modalPagarFactura = false;
    }


    public function deber($id)
    {

        $usuario = Pago::findOrFail($id);
        $usuario->factura_id = $id;
        $usuario->pagado = $this->pagado2;
        $usuario->fecha_pago = Carbon::now();
        $usuario->save();
        $this->reset();
    }








    public function render()
    {
        $facturas = Factura::Simplepaginate(5);
        $proveedores = Proveedor::all();
        $pagos = Pago::all();
        return view('livewire.factura-livewire', compact('proveedores', 'facturas', 'pagos'));
    }
}
