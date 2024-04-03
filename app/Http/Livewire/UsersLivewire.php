<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UsersLivewire extends Component

{

    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $actualizando;

    public function createUser()
    {

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Limpiar los campos después de guardar
        $this->reset();
        session()->flash('message', 'Usuario creado exitosamente.');
    }



    public function delete($id)
    {

        User::destroy($id);
        session()->flash('error', 'Usuario eliminado correctamente .');
    }


    public function edit($id)
    {
        $user = User::find($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;


        $this->actualizando = true; // Cambia a modo actualización
        session()->flash('message', ' El Id del usuario que va actualizar es el  .' . $id);
    }

    public function update($id)
    {
        $user = User::findOrFail($id);
        // Si se ha subido una nueva imagen, se guarda y se actualiza la URL de la imagen


        // Actualizar los demás campos del producto
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = $this->password;
        $user->save();
        $this->reset();
        session()->flash('message', 'Usuario actualizado exitoxamente .');
    }

    //codigo del modal para eliminar  un usuario
    public $modalAbierto = false;
    public $contrasena = '';
    public $mensajeError = '';
    public $UsuarioEliminar;

    public function abrirModal($id)
    {
        $this->modalAbierto = true;
        $this->UsuarioEliminar = $id;
    }

    public function cerrarModal()
    {
        $this->modalAbierto = false;
    }

    public function eliminarUsuario()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();
        //verifica que no se elimine el usuario logeado
        if ($this->UsuarioEliminar != $user->id) {
            // Verificar si la contraseña es correcta
            if (password_verify($this->contrasena, $user->password)) {
                // Eliminar el usuario
                User::findOrFail($this->UsuarioEliminar)->delete();

                // Cerrar el modal después de eliminar el usuario
                $this->cerrarModal();
                session()->flash('message', 'Usuario eliminado exitoxamente .');
            } else {
                // Mostrar un mensaje de error si la contraseña es incorrecta

                session()->flash('message', 'Contraseña incorrecta .');
            }
        }else {
            session()->flash('message', 'No te puedes elimiar a ti mismo .');
        }
    }


    public function render()
    {
        $users = User::paginate(12);

        return view('livewire.users-livewire', compact('users'));
    }
}
