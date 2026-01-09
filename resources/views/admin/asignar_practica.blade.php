<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Asignar Práctica
        </h2>
    </x-slot>
    
    <div class="py-6">
        <div class="max-w-xl mx-auto bg-white p-6 shadow rounded">

            <p><strong>Estudiante:</strong> {{ $estudiante->name }}</p>
            <p><strong>Carrera:</strong> {{ $estudiante->carrera }}</p>

            <form method="POST" action="{{ route('admin.practica.store') }}">
                @csrf

                <input type="hidden" name="user_id" value="{{ $estudiante->id }}">

                <div class="mt-4">
                    <label>Tipo de Práctica</label>
                    <select name="tipo" class="w-full border p-2" required>
                        <option value="">Seleccione</option>
                        <option value="I">Práctica I</option>
                    </select>
                </div>

                <div class="mt-4">
                    <label>Lugar de Prácticas</label>
                    <input type="text" name="lugar_practica" class="w-full border p-2" required>
                </div>

                <div class="mt-4">
                    <label>Horas requeridas</label>
                    <input type="number" name="horas_requeridas" class="w-full border p-2" required>
                </div>

                <div class="mt-6">
                    <button class="bg-blue-600 text-white px-4 py-2 rounded">
                        Asignar Práctica
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
