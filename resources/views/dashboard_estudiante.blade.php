<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Mis Prácticas
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded">

                @if ($practicas->isEmpty())
                    <div class="text-gray-600">
                        Aún no tienes prácticas asignadas.
                    </div>
                @else
                    <table class="w-full border">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border p-2">Tipo</th>
                                <th class="border p-2">Lugar</th>
                                <th class="border p-2">Horas</th>
                                <th class="border p-2">Estado</th>
                                <th class="border p-2">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($practicas as $practica)
                                <tr>
                                    <td class="border p-2 text-center">
                                        Práctica {{ $practica->tipo }}
                                    </td>

                                    <td class="border p-2">
                                        {{ $practica->lugar_practica }}
                                    </td>

                                    <td class="border p-2 text-center">
                                        {{ $practica->horas_requeridas }}
                                    </td>

                                    <td class="border p-2 text-center font-semibold">
                                        @if ($practica->estado === 'asignada')
                                            <span class="text-blue-600">Asignada</span>
                                        @elseif ($practica->estado === 'pendiente_revision')
                                            <span class="text-yellow-600">Pendiente de revisión</span>
                                        @elseif ($practica->estado === 'aprobada')
                                            <span class="text-green-600">Aprobada</span>
                                        @elseif ($practica->estado === 'rechazada')
                                            <span class="text-red-600">Rechazada</span>
                                        @endif
                                    </td>

                                    <td class="border p-2 text-center">
                                        @if ($practica->estado === 'asignada' || $practica->estado === 'rechazada')
                                            <form action="{{ route('estudiante.practica.subir', $practica->id) }}"
                                                    method="POST"
                                                    enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" name="documento" required class="mb-2">
                                                <button class="text-blue-600 underline">
                                                    Enviar documento
                                                </button>
                                            </form>

                                        @elseif ($practica->estado === 'pendiente_revision')
                                            <span class="text-gray-600">
                                                Documento enviado
                                            </span>

                                        @elseif ($practica->estado === 'aprobada')
                                            <span class="text-green-600">
                                                ✔ Finalizada
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
