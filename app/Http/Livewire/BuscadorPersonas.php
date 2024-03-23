<?php

namespace App\Http\Livewire;

use App\Models\Area;
use App\Models\Cargo;
use App\Models\Equipo;
use App\Models\Estado;
use App\Models\Persona;
use App\Models\Usuario;
use Faker\Provider\ar_EG\Person;
use Livewire\Component;
use Livewire\WithPagination;

class BuscadorPersonas extends Component
{
    use WithPagination;
    //variables que vamos a usar
    public $search = '';
    public $results = [];
    public $showlist = false;
    public $equipo;
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
    public $modalMensajeUsuario = false;
    public $modalAbierto = false;
    public $usuarioId;
 //funcion  para buscar usuarios
    public function searchProduct()
    {
        $this->results = Usuario::where('nombre', 'like', '%' . $this->search . '%')->take(5)->get();
        $this->showlist = true;
        session()->flash('message', 'EL resultado muestra los 5 registros mas coincidentes');
    }

    public function getProduct($id)
    {
        $this->equipo = Usuario::find($id);
        $this->showlist = false;
    }


    public function resetBusqueda()
    {
        $this->reset([
            'search',
            'results',
            'showlist' => false, // Establecer showlist en false cuando se borra la búsqueda
        ]);
    }

    public function delet($id)
    {

        Usuario::destroy($id);
        // Limpiar los campos después de guardar
        $this->reset();
        session()->flash('message', 'Usuario eliminado exitoxamente.');
    }


    //funciones para el modal de eliminacion


    public function eliminarUsuario($id)
    {
        // Buscar el usuario por su ID
        $usuario = Usuario::findOrFail($id);

        // Eliminar el usuario de la base de datos
        $usuario->delete();

        $this->cerrarModal();

        // Mensaje de éxito

        session()->flash('message', 'Usuario eliminado exitosamente.');
        $this->reset();
        //modal de  mensaje
        $this->modalMensajeUsuario = true;
    }

    public function abrirModal($id)
    {
        $this->usuarioId = Usuario::findOrFail($id);
        $this->modalAbierto = true;
    }

    public function cerrarModal()
    {
        $this->modalAbierto = false;
    }



    //funciones para el modal de actualizacion
    public $modalActualizar = false;
    public $usuarioSeleccionado;


    public function abrirModalAct($id)
    {
        $this->usuarioSeleccionado = Usuario::findOrFail($id);
        $this->modalActualizar = true;


        $this->nombre = $this->usuarioSeleccionado->nombre;
        $this->apellido = $this->usuarioSeleccionado->apellido;
        $this->documento = $this->usuarioSeleccionado->documento;
        $this->telefono = $this->usuarioSeleccionado->telefono;
        $this->correo = $this->usuarioSeleccionado->correo;
        $this->direccion = $this->usuarioSeleccionado->direccion;
        $this->area_id = $this->usuarioSeleccionado->area_id;
        $this->estado_id = $this->usuarioSeleccionado->estado_id;
        $this->cargo_id = $this->usuarioSeleccionado->cargo_id;
    }



    public function update($id)
    {

        // Obtener el usuario que se está actualizando
        $usuario = Usuario::findOrFail($id);

        // Actualizar los campos del usuario basado en los datos del formulario
        $usuario->nombre = $this->nombre;
        $usuario->apellido = $this->apellido;
        $usuario->documento = $this->documento;
        $usuario->telefono = $this->telefono;
        $usuario->correo = $this->correo;
        $usuario->direccion = $this->direccion;
        $usuario->cargo_id = $this->cargo_id;
        $usuario->area_id = $this->area_id;
        $usuario->estado_id = $this->estado_id;
        // Actualiza otros campos aquí si es necesario

        // Guardar los cambios en la base de datos
        $usuario->save();

        // Cerrar el modal de actualización
        $this->cerrarModalAct();

        // Limpiar los campos del formulario
        $this->reset();

        $this->modalMensajeUsuario = true;

        // Mostrar un mensaje de éxito
        session()->flash('message', 'Usuario actualizado exitosamente.');
    }


    public function cerrarModalAct()
    {
        $this->modalActualizar = false;
    }

    public function cerrarModalMensaje()
    {
        $this->modalMensajeUsuario = false;
    }



    public function render()
    {
        $cargos = Cargo::all();
        $areas = Area::all();
        $estados = Estado::all();
        return view('livewire.buscador-personas', compact('cargos', 'areas', 'estados'));
    }
}
