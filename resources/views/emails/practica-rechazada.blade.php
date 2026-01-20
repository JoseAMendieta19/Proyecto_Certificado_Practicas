<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica Rechazada</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: #ef4444;
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background: #ffffff;
            padding: 30px;
            border: 1px solid #e5e7eb;
        }
        .footer {
            text-align: center;
            padding: 20px;
            color: #6b7280;
            font-size: 12px;
            background: #f9fafb;
            border-radius: 0 0 10px 10px;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            background: #ef4444;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            margin: 20px 0;
        }
        .alert {
            background: #fee2e2;
            border-left: 4px solid #dc2626;
            padding: 15px;
            border-radius: 4px;
            margin: 20px 0;
        }
        ul {
            padding-left: 20px;
        }
        ol {
            padding-left: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Práctica Rechazada</h1>
    </div>

    <div class="content">
        <p>
            Estimado/a <strong>{{ $practica->estudiante->nombres }} {{ $practica->estudiante->apellidos }}</strong>,
        </p>

        <p>
            Te informamos que tu <strong>Práctica {{ $practica->tipo }}</strong> ha sido <strong>rechazada</strong>
            y requiere correcciones antes de poder ser aprobada.
        </p>

        <div class="alert">
            <strong>Motivo del rechazo:</strong>
            <p>{{ $practica->observaciones }}</p>
        </div>

        <p><strong>Detalles de la práctica:</strong></p>
        <ul>
            <li><strong>Lugar de práctica:</strong> {{ $practica->lugarPractica->nombre ?? 'N/A' }}</li>
            <li><strong>Horas requeridas:</strong> {{ $practica->horas_requeridas }} horas</li>
            <li><strong>Periodo:</strong> {{ $practica->anio_lectivo ?? 'N/A' }}</li>
            <li><strong>Fecha de inicio:</strong>
                {{ $practica->fecha_inicio ? $practica->fecha_inicio->format('d/m/Y') : 'N/A' }}
            </li>
        </ul>

        <p><strong>¿Qué debes hacer ahora?</strong></p>
        <ol>
            <li>Revisa cuidadosamente el motivo del rechazo indicado arriba.</li>
            <li>Realiza las correcciones necesarias en tu documento.</li>
            <li>Vuelve a ingresar al sistema y sube nuevamente el archivo corregido.</li>
        </ol>

        <p>
            Si tienes dudas adicionales, puedes comunicarte con el administrador del sistema.
        </p>

        <p>
            Atentamente,<br>
            <strong>Sistema de Gestión y Canje de Certificados de Prácticas</strong>
        </p>
    </div>

    <div class="footer">
        <p>Sistema de Gestión y Canje de Certificados de Prácticas</p>
        <p>Este es un correo automático, por favor no responder.</p>
    </div>
</div>

</body>
</html>
