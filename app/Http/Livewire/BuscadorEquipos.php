<?php

namespace App\Http\Livewire;

use App\Http\Controllers\Usuario;
use App\Models\Equipo;
use Livewire\Component;

class BuscadorEquipos extends Component
{
    public $search = '';
    public $results = [];
    public $showlist = false;
    public $equipo;

    public function searchProduct()
    {
        $this->results = Equipo::where('nombre', 'like', '%' . $this->search . '%')->get();
        $this->showlist = true;
    }

    public function getProduct($id)
    {
        $this->equipo = Equipo::find($id);
        $this->showlist = false;
    }


    public function resetBusqueda()
    {
        $this->reset([
            'search',

        ]);
    }
   
    public function render()
    {
        return view('livewire.buscador-equipos');
    }
}
