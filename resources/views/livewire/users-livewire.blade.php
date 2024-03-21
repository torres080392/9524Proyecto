<div class="container mt-0">
    <div class="row align-items-start"> <!-- Utilizando align-items-start para alinear los elementos en la parte superior -->
        <div class="col-lg-6">
        
            <x-guest-layout>
                <x-authentication-card>
                    <x-slot name="logo">
                        <a href="/">
                        
                            <!-- Aquí puedes insertar tu logo -->
                        </a>
                    </x-slot>
                    <div>
                        @if (session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                <span class="block sm:inline">{{ session('message') }}</span>
                            </div>
                        @endif
                    </div>
                    <h4>Formulario para crear usuarios del sistema</h4>
        
                    <x-validation-errors class="mb-4" />
        
                    <form wire:submit.prevent="createUser">
                        @csrf
                        <div>
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>
        
                        <div class="mt-4">
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        </div>
        
                        <div class="mt-4">
                            <x-label for="password" value="{{ __('Password') }}" />
                            <x-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        </div>
        
                        <div class="mt-4">
                            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            <x-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        </div>
        
                        <div class="flex items-center justify-end mt-4">
                            <x-button>
                                {{ __('Crear') }}
                            </x-button>
                        </div>
                    </form>
                </x-authentication-card>
            </x-guest-layout>
        </div>
        <div class="col-lg-6">
            <h4>Listado de usuarios del sistema</h4>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                               
                                <td>
                                    <button wire:click="edit({{ $user->id }})" class="btn btn-sm btn-warning">Editar</button>
                                    <button wire:click="update({{ $user->id }})" class="btn btn-sm btn-warning">Actualizar</button>
                                    <button wire:click="delete({{ $user->id }})" class="btn btn-sm btn-dark">Eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
