<?php

namespace App\Http\Livewire;

use App\Models\Equipo;
use App\Models\Usuario;
use Livewire\Component;

class ListadoEquipo extends Component
{

      //funciones para el modal de actualizacion
      public $usuario_id ='';
      public $modalActualizar = false;
      public $equipoSeleccionado;

    public function abrirModalAct($id)
    {
        $this->equipoSeleccionado = Equipo::findOrFail($id);
        $this->modalActualizar = true;


        $this->usuario_id = $this->equipoSeleccionado->usuario_id;
     
    }






    public function delete($id)
    {
        Equipo::destroy($id);
        $this->reset();
        session()->flash('message', 'Equipo eliminado exitoxamente.');
    }

 

    public function render()
    {
$usuarios= Usuario::all();
        $totalEquipos = Equipo::count();
        $equipos = Equipo::paginate(5);
        return view('livewire.listado-equipo', compact('equipos','totalEquipos','usuarios'));
    }
}
