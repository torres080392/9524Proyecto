<?php

namespace App\Http\Livewire;

use App\Models\Usuario;
use App\Models\Condicion;
use App\Models\Equipo;
use App\Models\Tipo;
use Livewire\Component;

class BuscadorEquipos extends Component
{
    public $search = '';
    public $results = [];
    public $showlist = false;
    public $equipo;
    public $nombre = '';
    public $serial = '';
    public $compra = '';
    public $garatiaInicial;
    public $garatiaFinal;
    public $usuario_id = '';
    public $condicion_id = '';
    public $tipo_id = '';
    public $actualizando = '';
    public $modalMensaje = false; //modal de mensaje
    //funciones para el modal de eliminacion
    public $modalAbierto = false;
    public $usuarioId;


    //funcion para buscar equipos
    public function searchProduct()
    {
        if ($this->search == true) {
            $this->results = Equipo::where('serial', 'like', '%' . $this->search . '%')->take(5)->get();
            $this->showlist = true;
        }else {
            $this->showlist = false;
        }
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




    public function eliminarUsuario($id)
    {
        // Buscar el usuario por su ID
        $usuario = Equipo::findOrFail($id);

        // Eliminar el usuario de la base de datos
        $usuario->delete();
        //cerrar modal despues de la accion
        $this->cerrarModal();
        //modal de mensaje

        // Mensaje de éxito
        session()->flash('message', 'Equipo eliminado exitosamente.');
        $this->reset();
        $this->modalMensaje = true;
    }

    public function abrirModal($id)
    {
        $this->usuarioId = Equipo::findOrFail($id);
        $this->modalAbierto = true;
    }

    public function cerrarModal()
    {
        $this->modalAbierto = false;
    }


    //funciones para el modal de actualizacion
    public $modalActualizar = false;
    public $equipoSeleccionado;


    public function abrirModalAct($id)
    {
        $this->equipoSeleccionado = Equipo::findOrFail($id);
        $this->modalActualizar = true;
        $this->usuario_id = $this->equipoSeleccionado->usuario_id;
        $this->condicion_id = $this->equipoSeleccionado->condicion_id;
        $this->tipo_id = $this->equipoSeleccionado->tipo_id;
        $this->nombre = $this->equipoSeleccionado->nombre;
        $this->serial = $this->equipoSeleccionado->serial;
        $this->compra = $this->equipoSeleccionado->compra;
        $this->garatiaInicial = $this->equipoSeleccionado->garatiaInicial;
        $this->garatiaFinal = $this->equipoSeleccionado->garatiaFinal;
    }



    public function update($id)
    {

        // Obtener el usuario que se está actualizando
        $usuario = Equipo::findOrFail($id);

        // Actualizar los campos del usuario basado en los datos del formulario
        $usuario->usuario_id = $this->usuario_id;
        $usuario->condicion_id = $this->condicion_id;
        $usuario->tipo_id = $this->tipo_id;
        $usuario->nombre = $this->nombre;
        $usuario->serial = $this->serial;
        $usuario->compra = $this->compra;
        $usuario->garatiaInicial = $this->garatiaInicial;
        $usuario->garatiaFinal = $this->garatiaFinal;


        // Actualiza otros campos aquí si es necesario

        // Guardar los cambios en la base de datos
        $usuario->save();

        // Cerrar el modal de actualización
        $this->cerrarModalAct();

        // Limpiar los campos del formulario
        $this->reset();
        //modal de mensaje
        $this->modalMensaje = true;
        // Mostrar un mensaje de éxito
        session()->flash('message', 'Equipo actualizado exitosamente.');
    }

    //cierra el modal 
    public function cerrarModalAct()
    {
        $this->modalActualizar = false;
    }


    //modal de mensaje
    public function cerrarModalMensaje()
    {
        $this->modalMensaje = false;
    }

    public function render()
    {
        $tipos =  Tipo::all();
        $condicions =  Condicion::all();
        $usuarios = Usuario::all();
        $equipos =  Equipo::all();
        return view('livewire.buscador-equipos', compact('tipos', 'condicions', 'usuarios', 'equipos'));
    }
}
