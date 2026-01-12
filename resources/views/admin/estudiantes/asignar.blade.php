<x-admin-layout>
    <x-slot name="header">
        Asignar Práctica - {{ $estudiante->nombres }} {{ $estudiante->apellidos }}
    </x-slot>

    <div class="max-w-4xl">
        
        <!-- Información del Estudiante -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                Información del Estudiante
            </h3>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-500">Nombre Completo</p>
                    <p class="font-medium text-gray-900">{{ $estudiante->nombres }} {{ $estudiante->apellidos }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Email</p>
                    <p class="font-medium text-gray-900">{{ $estudiante->email }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Institución</p>
                    <p class="font-medium text-gray-900">{{ $estudiante->institucion->nombre ?? 'N/A' }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Carrera</p>
                    <p class="font-medium text-gray-900">{{ $estudiante->carrera->nombre ?? 'N/A' }}</p>
                </div>
            </div>
        </div>

        <!-- Formulario de Asignación -->
        <div class="bg-white rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Asignar Nueva Práctica</h3>
            </div>

            <form action="{{ route('admin.practica.store') }}" method="POST" class="p-6 space-y-6">
                @csrf
                <input type="hidden" name="user_id" value="{{ $estudiante->id }}">

                <!-- Tipo de Práctica -->
                <div>
                    <label for="tipo" class="block text-sm font-medium text-gray-700 mb-2">
                        Tipo de Práctica <span class="text-red-500">*</span>
                    </label>
                    <select name="tipo" 
                            id="tipo" 
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('tipo') border-red-500 @enderror">
                        <option value="">Seleccione el tipo de práctica</option>
                        @if(!$practicaI)
                            <option value="I" {{ old('tipo') == 'I' ? 'selected' : '' }}>Práctica I</option>
                        @endif
                        @if($practicaI && $practicaI->estado === 'aprobada' && !$practicaII)
                            <option value="II" {{ old('tipo') == 'II' ? 'selected' : '' }}>Práctica II</option>
                        @endif
                    </select>
                    @error('tipo')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">
                        @if(!$practicaI)
                            El estudiante debe completar primero la Práctica I
                        @elseif($practicaI && $practicaI->estado !== 'aprobada')
                            Debe aprobar la Práctica I antes de asignar la Práctica II
                        @endif
                    </p>
                </div>

                <!-- Lugar de Práctica -->
                <div>
                    <label for="lugar_practica_id" class="block text-sm font-medium text-gray-700 mb-2">
                        Lugar de Práctica <span class="text-red-500">*</span>
                    </label>
                    <select name="lugar_practica_id" 
                            id="lugar_practica_id" 
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('lugar_practica_id') border-red-500 @enderror">
                        <option value="">Seleccione un lugar</option>
                        @foreach($lugaresPractica as $lugar)
                            <option value="{{ $lugar->id }}" {{ old('lugar_practica_id') == $lugar->id ? 'selected' : '' }}>
                                {{ $lugar->nombre }} - {{ $lugar->direccion }}
                            </option>
                        @endforeach
                    </select>
                    @error('lugar_practica_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    @if($lugaresPractica->isEmpty())
                        <p class="mt-2 text-sm text-yellow-600">
                            ⚠️ No hay lugares de práctica disponibles. 
                            <a href="{{ route('admin.lugares.create') }}" class="text-blue-600 underline">Crear uno aquí</a>
                        </p>
                    @endif
                </div>

                <!-- Horas Requeridas -->
                <div>
                    <label for="horas_requeridas" class="block text-sm font-medium text-gray-700 mb-2">
                        Horas Requeridas <span class="text-red-500">*</span>
                    </label>
                    <input type="number" 
                           name="horas_requeridas" 
                           id="horas_requeridas" 
                           min="1"
                           max="500"
                           value="{{ old('horas_requeridas', 120) }}"
                           required
                           placeholder="Ej: 120"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('horas_requeridas') border-red-500 @enderror">
                    @error('horas_requeridas')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">Número de horas que debe completar el estudiante</p>
                </div>

                <!-- Fecha de Inicio -->
                <div>
                    <label for="fecha_inicio" class="block text-sm font-medium text-gray-700 mb-2">
                        Fecha de Inicio <span class="text-red-500">*</span>
                    </label>
                    <input type="date" 
                           name="fecha_inicio" 
                           id="fecha_inicio" 
                           value="{{ old('fecha_inicio', date('Y-m-d')) }}"
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('fecha_inicio') border-red-500 @enderror">
                    @error('fecha_inicio')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">Fecha en la que el estudiante debe comenzar la práctica</p>
                </div>

                <!-- Observaciones Iniciales (opcional) -->
                <div>
                    <label for="observaciones" class="block text-sm font-medium text-gray-700 mb-2">
                        Observaciones Iniciales (opcional)
                    </label>
                    <textarea name="observaciones" 
                              id="observaciones" 
                              rows="3"
                              placeholder="Instrucciones especiales o información adicional para el estudiante..."
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('observaciones') border-red-500 @enderror">{{ old('observaciones') }}</textarea>
                    @error('observaciones')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror>
                </div>

                <!-- Información adicional -->
                <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded">
                    <div class="flex">
                        <svg class="w-5 h-5 text-blue-500 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div class="text-sm text-blue-700">
                            <p class="font-medium">Información importante:</p>
                            <ul class="list-disc list-inside mt-2 space-y-1">
                                <li>El estudiante recibirá un email con los detalles de la práctica asignada</li>
                                <li>Una vez asignada, el estudiante deberá completar las horas y subir su certificado</li>
                                <li>Podrás revisar y aprobar/rechazar el documento cuando lo suba</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex items-center justify-end space-x-3 pt-4 border-t">
                    <a href="{{ route('admin.estudiantes.index') }}" 
                        class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                        Cancelar
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
                        Asignar Práctica
                    </button>
                </div>
            </form>
        </div>

    </div>

</x-admin-layout>