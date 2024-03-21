<?php

namespace App\Http\Controllers;

use App\Models\Condicion;
use App\Models\Equipo;
use App\Models\Tipo;
use App\Models\Usuario;
use Illuminate\Http\Request;

class EquipoController extends Controller
{

    public function equipoEditar()
    {   
       
        return view('components.actualizarEquipo');
    }
    
    public function ListadoLibros()
    {
        return view('components.listadoEquipos');
    }

    public function buscarEquipo()
    {
        return view('components.buscadorEquipos');
    }



    public function index()
    {
        return view('components.equipo');
    }
}
