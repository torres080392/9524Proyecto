<?php

namespace App\Http\Livewire;

use App\Models\Equipo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class EquipoEstadistica extends Component
{






    public function render()
    {

        $esinasig = DB::table('equipos')
            ->whereNull('usuario_id')
            ->count();

        $equiposHoy = DB::table('equipos')
            ->whereDate('created_at', '=', now()->toDateString())
            ->count();

        $equipo = Equipo::count();
        return view('livewire.equipo-estadistica', compact('equipo', 'esinasig', 'equiposHoy'));
    }
}
