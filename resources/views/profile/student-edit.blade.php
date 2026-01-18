<x-estudiante-layout>
    <x-slot name="header">
        Mi Perfil
    </x-slot>

    <div class="space-y-6">
        <!-- Información Personal (Solo lectura) -->
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- Actualizar Contraseña -->
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>
    </div>
</x-estudiante-layout>