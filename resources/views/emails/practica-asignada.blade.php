<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #ffffff;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: #3b82f6;
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background: #f9fafb;
            padding: 30px;
            border: 1px solid #e5e7eb;
        }
        .footer {
            text-align: center;
            padding: 20px;
            color: #6b7280;
            font-size: 12px;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            background: #3b82f6;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            margin: 20px 0;
        }
        .info-box {
            background: #e0f2fe;
            border-left: 4px solid #0284c7;
            padding: 15px;
            border-radius: 4px;
            margin: 20px 0;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Nueva Práctica Asignada</h1>
    </div>

    <div class="content">
        <p>
            Hola <strong>
                {{ $practica->estudiante->nombres ?? '' }}
                {{ $practica->estudiante->apellidos ?? '' }}
            </strong>,
        </p>

        <p>Se te ha asignado una nueva práctica profesional. A continuación encontrarás todos los detalles:</p>

        <div class="info-box">
            <p><strong>Detalles de tu práctica:</strong></p>
            <ul>
                <li><strong>Tipo:</strong> Práctica {{ $practica->tipo ?? 'No especificado' }}</li>
                <li><strong>Lugar:</strong> {{ $practica->lugarPractica->nombre ?? 'No especificado' }}</li>
                <li><strong>Dirección:</strong> {{ $practica->lugarPractica->direccion ?? 'No especificada' }}</li>
                <li><strong>Periodo:</strong> {{ $practica->anio_lectivo ?? 'N/A' }}</li>
                <li><strong>Horas a cumplir:</strong> {{ $practica->horas_requeridas ?? 0 }} horas</li>
                <li><strong>Fecha de inicio:</strong>
                    {{ optional($practica->fecha_inicio)->format('d/m/Y') ?? 'Pendiente' }}
                </li>
            </ul>
        </div>

        @if(!empty($practica->observaciones))
            <p><strong>Instrucciones adicionales:</strong></p>
            <p style="background: #fef3c7; padding: 15px; border-left: 4px solid #f59e0b; border-radius: 4px;">
                {{ $practica->observaciones }}
            </p>
        @endif

        <p><strong>¿Qué debes hacer ahora?</strong></p>
        <ol>
            <li>Preséntate en el lugar asignado en la fecha indicada</li>
            <li>Completa las {{ $practica->horas_requeridas ?? 0 }} horas de práctica</li>
            <li>Una vez finalices, sube tu certificado</li>
        </ol>

        <p>Para más información Ingresa al Sistema...</p>
        <p>¡Éxitos en tu práctica!</p>
    </div>

    <div class="footer">
        <p>Sistema de Gestión y Canje de Certificados de Prácticas</p>
        <p>Este es un correo automático, por favor no responder.</p>
    </div>
</div>

</body>
</html>
