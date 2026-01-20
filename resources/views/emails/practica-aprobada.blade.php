<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #10b981; color: white; padding: 30px; text-align: center; border-radius: 10px 10px 0 0; }
        .content { background: #f9fafb; padding: 30px; border: 1px solid #e5e7eb; }
        .footer { text-align: center; padding: 20px; color: #6b7280; font-size: 12px; }
        .button { display: inline-block; padding: 12px 24px; background: #10b981; color: white; text-decoration: none; border-radius: 6px; margin: 20px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>¡Práctica Aprobada!</h1>
        </div>
        <div class="content">
            <p>Estimado/a <strong>{{ $practica->estudiante->nombres }} {{ $practica->estudiante->apellidos }}</strong>,</p>
            
            <p>¡Tenemos excelentes noticias! Tu <strong>Práctica {{ $practica->tipo }}</strong> ha sido <strong>aprobada</strong> exitosamente.</p>
            
            <p><strong>Detalles de tu práctica:</strong></p>
            <ul>
                <li><strong>Lugar:</strong> {{ $practica->lugarPractica->nombre ?? 'N/A' }}</li>
                <li><strong>Horas completadas:</strong> {{ $practica->horas_requeridas }} horas</li>
                <li><strong>Periodo:</strong> {{ $practica->anio_lectivo ?? 'N/A' }}</li>
                <li><strong>Fecha de inicio:</strong> {{ $practica->fecha_inicio ? $practica->fecha_inicio->format('d/m/Y') : 'N/A' }}</li>
                <li><strong>Fecha de finalización:</strong> {{ $practica->fecha_finalizacion ? $practica->fecha_finalizacion->format('d/m/Y') : 'N/A' }}</li>
            </ul>

            @if($practica->observaciones)
                <p><strong>Comentarios del administrador:</strong></p>
                <p style="background: #e0f2fe; padding: 15px; border-left: 4px solid #0284c7; border-radius: 4px;">
                    {{ $practica->observaciones }}
                </p>
            @endif

            <p>Ahora puedes descargar tu certificado oficial desde el sistema.</p>

            <p>¡Felicitaciones por tu esfuerzo y dedicación!</p>
        </div>
        <div class="footer">
            <p>Sistema de Gestión y Canje de Certificados de Prácticas</p>
            <p>Este es un correo automático, por favor no responder.</p>
        </div>
    </div>
</body>
</html>