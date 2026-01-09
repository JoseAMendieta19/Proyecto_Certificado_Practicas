<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Dashboard del Administrador
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded">

                <h3 class="text-lg font-bold mb-4">Estudiantes Registrados</h3>

                <table class="w-full border">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-2">Nombre</th>
                            <th class="border p-2">Email</th>
                            <th class="border p-2">Institución</th>
                            <th class="border p-2">Carrera</th>
                            <th class="border p-2">Nivel</th>
                            <th class="border p-2 text-center">Acciones</th>
                            <th class="border p-2 text-center">Estado</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($estudiantes as $estudiante)
                            @php
                                $practicaI  = $estudiante->practicas->where('tipo', 'I')->first();
                                $practicaII = $estudiante->practicas->where('tipo', 'II')->first();

                                // práctica activa (prioridad II)
                                $practica = $practicaII ?? $practicaI;
                            @endphp

                            <tr>
                                <td class="border p-2">{{ $estudiante->name }}</td>
                                <td class="border p-2">{{ $estudiante->email }}</td>
                                <td class="border p-2">{{ $estudiante->institucion }}</td>
                                <td class="border p-2">{{ $estudiante->carrera }}</td>
                                <td class="border p-2">{{ $estudiante->nivel }}</td>

                                {{-- ================= ACCIONES ================= --}}
                                <td class="border p-2 text-center">

                                    {{-- NO ASIGNADA --}}
                                    @if (!$practica)
                                        <a href="{{ route('admin.practica.create', $estudiante->id) }}"
                                            class="text-blue-600 underline">
                                            Asignar Práctica I
                                        </a>

                                    {{-- ASIGNADA --}}
                                    @elseif ($practica->estado === 'asignada')
                                        <span class="text-gray-400">—</span>

                                    {{-- PENDIENTE DE REVISIÓN --}}
                                    @elseif ($practica->estado === 'pendiente_revision')
                                        <a href="{{ route('admin.practica.revisar', $practica->id) }}"
                                            class="text-orange-600 underline">
                                            Revisar archivo
                                        </a>

                                    {{-- APROBADA --}}
                                    @elseif ($practica->estado === 'aprobada')
                                        @if ($practica->tipo === 'I' && !$practicaII)
                                            <a href="{{ route('admin.practica.create', $estudiante->id) }}"
                                                class="text-blue-600 underline">
                                                Asignar Práctica II
                                            </a>
                                        @else
                                            <span class="text-gray-400">—</span>
                                        @endif

                                    {{-- RECHAZADA --}}
                                    @elseif ($practica->estado === 'rechazada')
                                        <a href="{{ route('admin.practica.create', $estudiante->id) }}"
                                            class="text-blue-600 underline">
                                            Reasignar práctica
                                        </a>
                                    @endif
                                </td>

                                {{-- ================= ESTADO ================= --}}
                                <td class="border p-2 text-center font-semibold">

                                    @if (!$practica)
                                        <span class="text-gray-600">No asignada</span>

                                    @else
                                        <span class="block">
                                            Práctica {{ $practica->tipo }}
                                        </span>

                                        @switch($practica->estado)
                                            @case('asignada')
                                                <span class="text-green-600">Asignada</span>
                                                @break
                                            @case('pendiente_revision')
                                                <span class="text-yellow-600">Pendiente de revisión</span>
                                                @break
                                            @case('aprobada')
                                                <span class="text-green-700">Aprobada</span>
                                                @break
                                            @case('rechazada')
                                                <span class="text-red-600">Rechazada</span>
                                                @break
                                        @endswitch
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
