<html lang="es">
<head>
<meta charset="UTF-8">
<title>Certificado Final de Prácticas Profesionales</title>
<style>
@page {
    size: letter landscape;
    margin: 1cm;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Times New Roman', serif;
    background: #fff;
    color: #222;
    font-size: 12.5px;
}

/* CONTENEDOR PRINCIPAL */
.certificado {
    position: relative;
    padding: 26px 48px 22px;
    max-width: 26.6cm;
    margin: 0 auto;
}
.certificado::before {
    content: "";
    position: absolute;
    top: 1cm;
    bottom: 1cm;
    left: 1cm;
    right: 1cm;
    border: 7px solid #c40000;
    pointer-events: none;
}



/* ENCABEZADO (MENOS INTERLINEADO) */
.header {
    text-align: center;
    margin-bottom: 10px;
    margin-top: 60px;
}

.header img {
    width: 80px;
    margin-bottom: 4px;
}

.universidad {
    font-size: 11.5px;
    font-weight: bold;
    color: #c40000;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    line-height: 1.25;
}

.facultad {
    font-size: 9.5px;
    color: #666;
    font-style: italic;
    line-height: 1.2;
}

/* TÍTULO (COMPACTO) */
.titulo-section {
    text-align: center;
    margin: 10px 0 12px;
}

.titulo {
    font-size: 22px;
    font-weight: bold;
    letter-spacing: 5px;
    color: #c40000;
    margin-bottom: 2px;
}

.subtitulo {
    font-size: 9.5px;
    color: #666;
    letter-spacing: 1.8px;
    line-height: 1.2;
}

/* CONTENIDO */
.contenido {
    text-align: center;
    max-width: 92%;
    margin: 0 auto;
    line-height: 1.55;
}

.intro-text {
    margin-bottom: 8px;
}

/* NOMBRE */
.nombre-section {
    margin: 8px 0 10px;
}

.nombre {
    font-size: 15px;
    font-weight: bold;
    padding: 6px 40px;
    border-bottom: 3px solid #c40000;
    text-transform: uppercase;
    letter-spacing: 2px;
    display: inline-block;
}

/* TEXTO PRINCIPAL */
.texto-principal {
    margin-bottom: 12px;
    line-height: 2;
}

/* DATOS (UN POCO MÁS DE AIRE AQUÍ) */
.datos {
    margin: 14px auto;
    padding: 14px 28px;
    max-width: 96%;
    position: relative;
}

.datos::before {
    content: "";
    position: absolute;
    left: 90px;     /* 👈 MUEVE la barra hacia el centro */
    top: 10px;
    bottom: 380px;
    width: 4px;
    background: #0672de;
}



.datos-tabla {
    width: 100%;
    border-collapse: collapse;
    
}

.datos-tabla td {
    width: 50%;
    padding: 6px 18px;
    vertical-align: top;
    font-size: 12px;
    line-height: 2;
}
.datos-tabla td:first-child {
    padding-left: 82px;   /* 🔹 empuja el texto hacia el centro */
}

.horas-detalle {
    display: block;
    font-size: 10.5px;
    color: #666;
    font-style: italic;
    margin-top: 3px;
}

/* DURACIÓN */
.duracion-lista {
    list-style: none;
    padding-left: 0;
}

.duracion-lista li {
    margin-bottom: 4px;
    line-height: 1.6;
}

/* TEXTO ADICIONAL */
.texto-adicional {
    font-size: 12.5px;
    line-height: 1.6;
    margin-top: 10px;
}

.texto-adicional p {
    margin-bottom: 8px;
}

.texto-adicional p:last-child {
    font-style: italic;
    text-align: center;
}

/* FECHA */
.fecha {
    text-align: center;
    margin-top: 10px;
    font-size: 10.5px;
    font-style: italic;
    color: #555;
}

/* FIRMAS */
.firmas-container {
    margin-top: 80px;
}

.firmas-tabla {
    width: 82%;
    margin: 0 auto;
}

.firmas-tabla td {
    text-align: center;
    vertical-align: bottom;
}

.linea-firma {
    width: 210px;
    border-top: 1.4px solid #333;
    margin: 0 auto 6px;
}

.firma-nombre {
    font-size: 11.5px;
    font-weight: bold;
}

.firma-cargo {
    font-size: 9.5px;
    color: #666;
}

/* FOOTER */
.footer {
    margin-top: 12px;
    padding-top: 6px;
    border-top: 1px solid #e0e0e0;
    text-align: center;
    font-size: 9px;
    color: #777;
}


</style>

</head>

<body>
<div class="certificado">
    
    <!-- ENCABEZADO -->
    <div class="header">
        <img src="https://aulavirtualmoodle.uleam.edu.ec/pluginfile.php/1/core_admin/logo/0x200/1767816587/logo_ULEAM_2017_vertical.png" alt="ULEAM Logo">
        <div class="universidad">
            {{ $estudiante->institucion->nombre ?? 'Universidad Laica Eloy Alfaro de Manabí' }}
        </div>
        <div class="facultad">
            Carrera: {{ $estudiante->carrera->nombre ?? 'No registrada' }}
        </div>
    </div>

    <!-- TITULO -->
    <div class="titulo-section">
        <div class="titulo">CERTIFICADO FINAL</div>
        <div class="subtitulo">Prácticas Profesionales</div>
    </div>

    <!-- CONTENIDO -->
    <div class="contenido">
        <div class="intro-text">
            La Universidad Laica Eloy Alfaro de Manabí certifica que el/la estudiante:
        </div>

        <div class="nombre-section">
            <div class="nombre">
                {{ $estudiante->nombres }} {{ $estudiante->apellidos }}
            </div>
        </div>

        <div class="texto-principal">
            con cédula de identidad <strong>{{ $estudiante->cedula }}</strong>, ha cumplido satisfactoriamente 
            la totalidad de las Prácticas Profesionales correspondientes a su plan de estudios, conforme a la 
            normativa institucional vigente, habiendo aprobado <strong>Prácticas Profesionales I</strong> y 
            <strong>Prácticas Profesionales II</strong>.
        </div>

        <!-- DATOS EN FORMATO TABULAR BIEN ESTRUCTURADO -->
        <div class="datos">
            <table class="datos-tabla" cellspacing="0" cellpadding="0">
                <tr>
                    <!-- COLUMNA IZQUIERDA - ENTIDADES Y HORAS -->
                    <td>
                        <p><strong>Entidad Práctica I:</strong> {{ ucfirst($practicaI->lugarPractica->nombre ?? 'No especificada') }}</p>
                        <p><strong>Entidad Práctica II:</strong> {{ ucfirst($practicaII->lugarPractica->nombre ?? 'No especificada') }}</p>
                        <p><strong>Horas totales cumplidas:</strong> {{ $totalHoras }} horas
                            <span class="horas-detalle">({{ $practicaI->horas_requeridas }} horas en PP I y {{ $practicaII->horas_requeridas }} horas en PP II)</span>
                        </p>
                    </td>
                    
                    <!-- COLUMNA DERECHA - DURACIÓN -->
                    <td>
    <p><strong>Duración de las prácticas:</strong></p>
    <ul class="duracion-lista">
        <li>
            <strong>Prácticas Profesionales I:</strong>
            <span>
                {{ \Carbon\Carbon::parse($practicaI->fecha_inicio)->format('d/m/Y') }}
                al
                {{ \Carbon\Carbon::parse($practicaI->fecha_finalizacion)->format('d/m/Y') }}
            </span>
        </li>
        <li>
            <strong>Prácticas Profesionales II:</strong>
            <span>
                {{ \Carbon\Carbon::parse($practicaII->fecha_inicio)->format('d/m/Y') }}
                al
                {{ \Carbon\Carbon::parse($practicaII->fecha_finalizacion)->format('d/m/Y') }}
            </span>
        </li>
    </ul>
</td>

                </tr>
            </table>
        </div>

        <!-- TEXTO ADICIONAL -->
        <div class="texto-adicional">
            <p>Durante el desarrollo de las prácticas, el/la estudiante demostró responsabilidad, compromiso y un 
            desempeño acorde a los objetivos académicos establecidos. En virtud de lo expuesto, se certifica la 
            culminación total del proceso de prácticas profesionales.</p>
            
            <p>El presente certificado se expide a solicitud del interesado para los fines que estime convenientes.</p>
        </div>

        <div class="fecha">
            Manta, {{ now()->day }} de {{ now()->locale('es')->monthName }} de {{ now()->year }}.
        </div>
    </div>

    <!-- FIRMAS -->
    <div class="firmas-container">
        <table class="firmas-tabla" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <div class="linea-firma"></div>
                    <div class="firma-nombre">Ing. Juan Pérez</div>
                    <div class="firma-cargo">Director de Carrera</div>
                </td>
                
                <td>
                    <div class="linea-firma"></div>
                    <div class="firma-nombre">Dra. María González</div>
                    <div class="firma-cargo">Coordinadora de Prácticas</div>
                </td>
            </tr>
        </table>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        Documento académico oficial – Certificado Final de Prácticas Profesionales – Código: {{ strtoupper(substr(md5($practicaI->id.$practicaII->id.$estudiante->cedula),0,12)) }}
    </div>

</div>
</body>
</html>