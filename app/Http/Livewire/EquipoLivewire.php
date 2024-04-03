<?php

namespace App\Http\Livewire;

use App\Models\Condicion;
use App\Models\Equipo;
use App\Models\Tipo;
use App\Models\Usuario;
use Livewire\Component;
use Livewire\WithPagination;

class EquipoLivewire extends Component
{
    use WithPagination;
    public $search = '';
    public $results = [];
    public $showlist = false;
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

    public function crearEquipo()
    {
        // Aquí puedes agregar la lógica para guardar los datos en la base de datos
        //Por ejemplo:
        Equipo::create([
            'usuario_id' => $this->usuario_id,
            'condicion_id' => $this->condicion_id,
            'tipo_id' => $this->tipo_id,
            'nombre' => $this->nombre,
            'serial' => $this->serial,
            'compra' => $this->compra,
            'garatiaInicial' => $this->garatiaInicial,
            'garatiaFinal' => $this->garatiaFinal,

        ]);

        // Limpiar los campos después de guardar
        $this->reset();
        //modal de mensaje
        $this->modalMensaje = true;
        session()->flash('message', 'Equipo creado exitoxamente.');
    }

    //funciones para el modal de eliminacion
    public $modalAbierto = false;
    public $usuarioId;

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
        // Obtener el equipo que se está actualizando
        $equipo = Equipo::findOrFail($id);

        // Formatear las fechas correctamente en el formato YYYY-MM-DD
        // Formatear las fechas en el formato YYYY-MM-DD
        $compra = date('Y-m-d', strtotime($this->compra));
        $garatiaInicial = date('Y-m-d', strtotime($this->garatiaInicial));
        $garatiaFinal = date('Y-m-d', strtotime($this->garatiaFinal));

        // Actualizar los campos del equipo basado en los datos del formulario
        $equipo->usuario_id = $this->usuario_id;
        $equipo->condicion_id = $this->condicion_id;
        $equipo->tipo_id = $this->tipo_id;
        $equipo->nombre = $this->nombre;
        $equipo->serial = $this->serial;
        $equipo->compra = $compra;
        $equipo->garatiaInicial = $garatiaInicial;
        $equipo->garatiaFinal = $garatiaFinal;

        // Guardar los cambios en la base de datos
        $equipo->save();

        // Cerrar el modal de actualización
        $this->cerrarModalAct();

        // Limpiar los campos del formulario
        $this->reset();

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

    //buscar un usuario
    public function searchProduct()
    {
        if ($this->search == true) {
            $this->results = Usuario::where('nombre', 'like', '%' . $this->search . '%')->take(5)->get();
            $this->showlist = true;
        } else {
            $this->showlist = false;
        }
    }


    public function resetBusqueda()
    {
        $this->reset([
            'search',

        ]);
    }






    //muestra la vista y carga los datos de los modelos 
    public function render()

    {

        $totalEquipos = Equipo::count();
        $tipos =  Tipo::all();
        $condicions =  Condicion::all();
        $usuarios =  Usuario::all();
        $equipos =  Equipo::simplepaginate(4);
        return view('livewire.equipo-livewire', compact('tipos', 'condicions', 'usuarios', 'equipos', 'totalEquipos'));
    }
}
