<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <a href="{{Route('welcome')}}">
                <img src="storage/images/Logo9524.png" alt="Logo de mi Empresa" style="max-width: 500%; height: auto;">
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('¿Olvidaste tu contraseña? Ningún problema. Simplemente háganos saber su dirección de correo electrónico y le enviaremos un enlace para restablecer su contraseña que le permitirá elegir una nueva.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Enlace para restablecer contraseña de correo electrónico') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
