<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Asignar Práctica
        </h2>
    </x-slot>
    
    <div class="max-w-4xl mx-auto p-6">

        <h2 class="text-xl font-bold mb-4">
            Revisión de Práctica {{ $practica->tipo }}
        </h2>

        <p class="mb-2">
            <strong>Estudiante ID:</strong> {{ $practica->user_id }}
        </p>

        <p class="mb-4">
            <strong>Lugar:</strong> {{ $practica->lugar_practica }}
        </p>

        {{-- Ver / descargar archivo --}}
        <a href="{{ asset('storage/' . $practica->archivo_url) }}"
        target="_blank"
        class="text-blue-600 underline mb-6 inline-block">
            Ver documento PDF
        </a>

        <div class="flex gap-4 mt-6">

            {{-- APROBAR --}}
            <form method="POST"
                action="{{ route('admin.practica.aprobar', $practica->id) }}">
                @csrf
                <button class="bg-green-600 text-white px-4 py-2 rounded">
                    Aprobar
                </button>
            </form>

            {{-- RECHAZAR --}}
            <form method="POST"
                action="{{ route('admin.practica.rechazar', $practica->id) }}">
                @csrf
                <button class="bg-red-600 text-white px-4 py-2 rounded">
                    Rechazar
                </button>
            </form>

        </div>
    </div>
</x-app-layout>
