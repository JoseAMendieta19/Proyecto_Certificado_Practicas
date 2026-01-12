<x-admin-layout>
    <x-slot name="header">
        Certificados de Prácticas
    </x-slot>

    <div class="bg-white p-6 rounded shadow">
        <p class="text-gray-600 mb-4">
            Generación de certificados oficiales para estudiantes que aprobaron
            sus prácticas.
        </p>

        <table class="w-full">
            <thead>
                <tr>
                    <th class="text-left">Estudiante</th>
                    <th class="text-left">Práctica</th>
                    <th class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Juan Pérez</td>
                    <td>Práctica II</td>
                    <td class="text-center">
                        <button class="px-3 py-1 bg-blue-600 text-white rounded">
                            Generar PDF
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</x-admin-layout>
