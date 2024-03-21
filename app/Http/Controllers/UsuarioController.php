<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    //
    public function listadoUsuarios(){

        return view('components.listadoUsuarios');
    }

    public function index(){

        return view('components.usuarios');
    }
    public function buscarPersona()
    {
        return view('components.buscadorPersonas');
    }



}
