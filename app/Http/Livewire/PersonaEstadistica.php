<?php

namespace App\Http\Livewire;

use App\Models\Persona;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PersonaEstadistica extends Component
{
    public function render()
    {

        $personasHoy = DB::table('usuarios')
            ->whereDate('created_at', '=', now()->toDateString())
            ->count();

        $persona = Usuario::count();
        return view('livewire.persona-estadistica', compact('persona','personasHoy'));
    }
}
