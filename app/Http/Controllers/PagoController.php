<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    
    public function delete(){

        $pagos = Pago::destroy(1);

        

    }


}
