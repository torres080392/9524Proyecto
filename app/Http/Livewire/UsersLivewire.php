<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UsersLivewire extends Component

{

    public $name ='' ;
    public $email ='' ;
    public $password ='' ;
    public $password_confirmation='' ;
    public $actualizando;

    public function createUser(){
       
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);
    
            // Limpiar los campos después de guardar
            $this->reset();
            session()->flash('message', 'Usuario creado exitosamente.');
       
        }

    

    public function delete($id){

        User::destroy($id);
        session()->flash('error', 'Usuario eliminado correctamente .');

    }

    
    public function edit($id)
    {
        $user= User::find($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
 

        $this->actualizando = true; // Cambia a modo actualización
        session()->flash('message', ' El Id del usuario que va actualizar es el  .'.$id);
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


    public function render()
    {
        $users = User::paginate(12);

        return view('livewire.users-livewire', compact('users'));
    }
}
