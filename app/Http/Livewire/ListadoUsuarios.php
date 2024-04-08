<?php

namespace App\Http\Livewire;

use App\Models\Cargo;
use App\Models\Equipo;
use App\Models\Usuario;

use Livewire\Component;

class ListadoUsuarios extends Component
{
    public $nombre;
    public $apellido;
    public $documento;
    public $telefono;
    public $correo;
    public $direccion;
    public $cargo_id = '';
    public $area_id = '';
    public $estado_id = '';
    public $actualizando = '';
    public $modalMensaje = false;





    public function render()
    {
        $cargos = Cargo::all();
        $totalPersonas = Usuario::count();
        $usuarios = Usuario::paginate(8);
        return view('livewire.listado-usuarios', compact('usuarios', 'totalPersonas', 'cargos'));
    }
}
