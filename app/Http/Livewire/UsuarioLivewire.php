<?php

namespace App\Http\Livewire;

use App\Models\Area;
use App\Models\Cargo;
use App\Models\Estado;
use App\Models\Usuario;
use Livewire\Component;
use Livewire\WithPagination;

class UsuarioLivewire extends Component
{
    use WithPagination;
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
    public $modalMensaje = false; //modal de mensaje
    public $modalAbierto = false; //modal de actualizacion
    public $usuarioId;

    public function crearUsuario()
    {
        // Aquí puedes agregar la lógica para guardar los datos en la base de datos
        Usuario::create([
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'documento' => $this->documento,
            'telefono' => $this->telefono,
            'correo' => $this->correo,
            'direccion' => $this->direccion,
            'cargo_id' => $this->cargo_id,
            'area_id' => $this->area_id,
            'estado_id' => $this->estado_id,
        ]);

        // Limpiar los campos después de guardar
        $this->reset();
        //modal de mensaje
        $this->modalMensaje = true;
        //mensaje que se muestra
        session()->flash('message', 'Usuario creado exitoxamente.');
    }







    //funciones para el modal de eliminacion

    public function eliminarUsuario($id) //traemos el usuario por parametro
    {
        // Buscar el usuario por su ID
        $usuario = Usuario::findOrFail($id);

        // Eliminar el usuario de la base de datos
        $usuario->delete();

        $this->cerrarModal();

        // Mensaje de éxito
        session()->flash('message', 'Usuario eliminado exitosamente.');
        $this->reset();
        //modal de mensaje 
        $this->modalMensaje = true;
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

        //modal de mensaje
        $this->modalMensaje = true;
        // Mostrar un mensaje de éxito
        session()->flash('message', 'Usuario actualizado exitosamente.');
    }


    public function cerrarModalAct()
    {
        $this->modalActualizar = false;
        $this->reset();
    }

    //Modal de mensaje 

    public function cerrarModalMensaje()
    {
        $this->modalMensaje = false;
    }







    public function render()
    {
        $totalPersonas = Usuario::count();
        $cargos = Cargo::all();
        $areas = Area::all();
        $estados = Estado::all();
        $usuarios = Usuario::simplePaginate(10);

        return view('livewire.usuario-livewire', compact('cargos', 'areas', 'estados', 'usuarios', 'totalPersonas'));;
    }
}
