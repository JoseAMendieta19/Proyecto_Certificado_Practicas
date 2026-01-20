<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte de Prácticas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 18px;
            color: #1a1a1a;
        }
        .header p {
            margin: 5px 0;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background-color: #4B5563;
            color: white;
            padding: 8px;
            text-align: left;
            font-size: 9px;
            font-weight: bold;
        }
        td {
            border: 1px solid #ddd;
            padding: 6px;
            font-size: 9px;
        }
        tr:nth-child(even) {
            background-color: #f9fafb;
        }
        .badge {
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 8px;
            font-weight: bold;
            display: inline-block;
        }
        .badge-asignada {
    background-color: #DBEAFE;
    color: #1E40AF;
}

.badge-pendiente_revision {
    background-color: #FEF3C7;
    color: #92400E;
}

.badge-aprobada {
    background-color: #DCFCE7;
    color: #166534;
}

.badge-rechazada {
    background-color: #FEE2E2;
    color: #991B1B;
}

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 8px;
            color: #999;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>REPORTE DE PRÁCTICAS</h1>
        <p>Sistema de Gestión y Canje de Certificados</p>
        <p>Generado el: {{ $fecha_generacion }}</p>
        @if($estado)
            <p><strong>Filtrado por:</strong> {{ ucfirst(str_replace('_', ' ', $estado)) }}</p>
        @endif
    </div>

    <table>
        <thead>
            <tr>
                <th>Cédula</th>
                <th>Estudiante</th>
                <th>Email</th>
                <th>Periodo</th>
                <th>Carrera</th>
                <th>Práctica</th>
                <th>Lugar</th>
                <th>Horas</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estudiantes as $estudiante)
                @forelse($estudiante->practicas as $practica)
                    <tr>
                        <td>{{ $estudiante->cedula ?? 'N/A' }}</td>
                        <td>{{ $estudiante->nombres }} {{ $estudiante->apellidos }}</td>
                        <td>{{ $estudiante->email }}</td>
                        <td>{{ $practica->anio_lectivo ?? 'N/A' }}</td>
                        <td>{{ $estudiante->carrera->nombre ?? 'N/A' }}</td>
                        <td>Práctica {{ $practica->tipo }}</td>
                        <td>{{ $practica->lugarPractica->nombre ?? 'N/A' }}</td>
                        <td>{{ $practica->horas_requeridas }}h</td>
                        <td>
                            <span class="badge badge-{{ $practica->estado }}">
                                {{ ucfirst(str_replace('_', ' ', $practica->estado)) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>{{ $estudiante->cedula ?? 'N/A' }}</td>
                        <td>{{ $estudiante->nombres }} {{ $estudiante->apellidos }}</td>
                        <td>{{ $estudiante->email }}</td>
                        <td>-</td> 
                        <td>{{ $estudiante->carrera->nombre ?? 'N/A' }}</td>
                        <td colspan="4" style="text-align: center; color: #999;">Sin prácticas asignadas</td>
                    </tr>
                @endforelse
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Este documento fue generado automáticamente por el Sistema de Gestión de Prácticas</p>
        <p>Total de registros: {{ $estudiantes->sum(fn($e) => $e->practicas->count()) }}</p>
    </div>
</body>
</html>