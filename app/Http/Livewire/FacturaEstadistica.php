<?php

namespace App\Http\Livewire;

use App\Models\Factura;
use App\Models\Pago;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class FacturaEstadistica extends Component
{
    public function render()
    {

        $facturasHoy = DB::table('facturas')
        ->whereDate('created_at', '=', now()->toDateString())
        ->count();

        $factura = Factura::count();
        $facturaPagada = Pago::count();

        $deben = $factura - $facturaPagada ;
        return view('livewire.factura-estadistica', compact('factura','facturaPagada','facturasHoy','deben'));
    }
}
