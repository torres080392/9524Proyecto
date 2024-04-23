<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Pago;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class FacturaController extends Controller
{

    //Generar factura pdf
public function generarPDF($idFactura)
{   $pago = Pago::find($idFactura);
    $facturas = Factura::find($idFactura);
    $pdf = Pdf::loadView('factura_pdf', compact('facturas'));

    return $pdf->download('factura.pdf');
}

    public function index(){

        return view('components.factura');
    }
}
