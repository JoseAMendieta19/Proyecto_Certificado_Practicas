<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #3b82f6; color: white; padding: 30px; text-align: center; border-radius: 10px 10px 0 0; }
        .content { background: #f9fafb; padding: 30px; border: 1px solid #e5e7eb; }
        .footer { text-align: center; padding: 20px; color: #6b7280; font-size: 12px; }
        .button { display: inline-block; padding: 12px 24px; background: #3b82f6; color: white; text-decoration: none; border-radius: 6px; margin: 20px 0; }
        .info-box { background: #e0f2fe; border-left: 4px solid #0284c7; padding: 15px; border-radius: 4px; margin: 20px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Nuevo Documento para Revisar</h1>
        </div>
        <div class="content">
            <p>Hola Administrador,</p>
            
            <p>El estudiante <strong>{{ $practica->estudiante->nombres }} {{ $practica->estudiante->apellidos }}</strong> 
               ha subido un documento de validación para su <strong>Práctica {{ $practica->tipo }}</strong>.</p>

            <div class="info-box">
                <p><strong>Detalles de la práctica:</strong></p>
                <ul>
                    <li><strong>Estudiante:</strong> {{ $practica->estudiante->nombres }} {{ $practica->estudiante->apellidos }}</li>
                    <li><strong>Email:</strong> {{ $practica->estudiante->email }}</li>
                    <li><strong>Cédula:</strong> {{ $practica->estudiante->cedula ?? 'N/A' }}</li>
                    <li><strong>Periodo:</strong> {{ $practica->anio_lectivo ?? 'N/A' }}</li>
                    <li><strong>Práctica:</strong> Práctica {{ $practica->tipo }}</li>
                    <li><strong>Lugar:</strong> {{ $practica->lugarPractica->nombre ?? 'N/A' }}</li>
                    <li><strong>Horas:</strong> {{ $practica->horas_requeridas }} horas</li>
                    <li><strong>Fecha de finalización:</strong> {{ $practica->fecha_finalizacion ? $practica->fecha_finalizacion->format('d/m/Y') : 'N/A' }}</li>
                </ul>
            </div>

            <p>Por favor, revisa el documento y aprueba o rechaza la práctica.</p>

        </div>
        <div class="footer">
            <p>Sistema de Gestión y Canje de Certificados de Prácticas</p>
            <p>Este es un correo automático, por favor no responder.</p>
        </div>
    </div>
</body>
</html>