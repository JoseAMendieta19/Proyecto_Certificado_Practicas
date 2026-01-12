<x-admin-layout>
    <x-slot name="header">
        Dashboard Principal
    </x-slot>

    <!-- Tarjetas de estadísticas -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        
        <!-- Total Estudiantes -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Total Estudiantes</dt>
                        <dd class="text-3xl font-semibold text-gray-900">
                            {{ \App\Models\User::where('rol', 'estudiante')->count() }}
                        </dd>
                    </dl>
                </div>
            </div>
        </div>

        <!-- Prácticas Asignadas -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Prácticas Asignadas</dt>
                        <dd class="text-3xl font-semibold text-gray-900">
                            {{ \App\Models\Practica::where('estado', 'asignada')->count() }}
                        </dd>
                    </dl>
                </div>
            </div>
        </div>

        <!-- Pendientes Revisión -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Pendientes Revisión</dt>
                        <dd class="text-3xl font-semibold text-gray-900">
                            {{ \App\Models\Practica::where('estado', 'pendiente_revision')->count() }}
                        </dd>
                    </dl>
                </div>
            </div>
        </div>

        <!-- Prácticas Aprobadas -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Prácticas Aprobadas</dt>
                        <dd class="text-3xl font-semibold text-gray-900">
                            {{ \App\Models\Practica::where('estado', 'aprobada')->count() }}
                        </dd>
                    </dl>
                </div>
            </div>
        </div>

    </div>

    <!-- Actividad Reciente -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Actividad Reciente</h3>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                @php
                    $practicasRecientes = \App\Models\Practica::with('estudiante')
                        ->latest()
                        ->take(5)
                        ->get();
                @endphp

                @forelse($practicasRecientes as $practica)
                    <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-0">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold">
                                    {{ substr($practica->estudiante->nombres, 0, 1) }}
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-900">
                                    {{ $practica->estudiante->nombres }} {{ $practica->estudiante->apellidos }}
                                </p>
                                <p class="text-sm text-gray-500">
                                    Práctica {{ $practica->tipo }} - 
                                    <span class="
                                        @if($practica->estado == 'asignada') text-blue-600
                                        @elseif($practica->estado == 'pendiente_revision') text-yellow-600
                                        @elseif($practica->estado == 'aprobada') text-green-600
                                        @else text-red-600
                                        @endif
                                    ">
                                        {{ ucfirst(str_replace('_', ' ', $practica->estado)) }}
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="text-sm text-gray-500">
                            {{ $practica->created_at->diffForHumans() }}
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-4">No hay actividad reciente</p>
                @endforelse
            </div>
        </div>
    </div>

</x-admin-layout>