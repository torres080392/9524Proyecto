<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Usuario;

class UserObserver
{
 
    public function created(Usuario $usuario)
    {
         // Crear un nuevo usuario en el modelo User
         User::create([
            'name' => $usuario->name,
            'email' => $usuario->email,
            // Agrega aquí los demás campos del usuario que desees copiar o inicializar
        ]);
    }


    public function updated(Usuario $usuario)
    {
        //
    }

    public function deleted(Usuario $usuario)
    {
        //
    }


    public function restored(Usuario $usuario)
    {
        //
    }


    public function forceDeleted(Usuario $usuario)
    {
        //
    }
}
