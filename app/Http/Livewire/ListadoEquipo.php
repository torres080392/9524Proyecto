<?php

namespace App\Http\Livewire;

use App\Models\Equipo;
use Livewire\Component;

class ListadoEquipo extends Component
{
    public function delete($id)
    {
        Equipo::destroy($id);
        $this->reset();
        session()->flash('message', 'Equipo eliminado exitoxamente.');
    }

 

    public function render()
    {

        $totalEquipos = Equipo::count();
        $equipos = Equipo::paginate(5);
        return view('livewire.listado-equipo', compact('equipos','totalEquipos'));
    }
}
