<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>CV - {{ $cv['name'] }} {{ $cv['surname'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .contact-info {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }
        .section {
            margin-bottom: 25px;
        }
        .section-title {
            font-size: 18px;
            font-weight: bold;
            border-bottom: 2px solid #333;
            margin-bottom: 15px;
            padding-bottom: 5px;
        }
        .experience-item, .education-item {
            margin-bottom: 15px;
        }
        .company-name, .institution {
            font-weight: bold;
            font-size: 16px;
        }
        .position, .degree {
            font-style: italic;
            color: #666;
        }
        .date {
            color: #888;
            font-size: 14px;
        }
        .skills {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .skill-item {
            background: #f5f5f5;
            padding: 5px 10px;
            border-radius: 3px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="name">{{ $cv['name'] }} {{ $cv['surname'] }}</div>
        <div class="contact-info">
            {{ $cv['adress'] }} • {{ $cv['phone'] }} • {{ $cv['email'] }}
        </div>
    </div>

    @if(!empty($cv['objetivo_profesional']))
    <div class="section">
        <div class="section-title">Perfil Profesional</div>
        <p>{{ $cv['objetivo_profesional'] }}</p>
    </div>
    @endif

    @if(!empty($cv['empresas']))
    <div class="section">
        <div class="section-title">Experiencia Profesional</div>
        @foreach($cv['empresas'] as $empresa)
        <div class="experience-item">
            <div class="company-name">{{ $empresa['company_name'] }}</div>
            <div class="position">{{ $empresa['charge'] }}</div>
            <div class="date">{{ $empresa['start_date'] }} - {{ $empresa['end_date'] }}</div>
        </div>
        @endforeach
    </div>
    @endif

    <div class="section">
        <div class="section-title">Educación</div>
        <div class="education-item">
            <div class="institution">{{ $cv['secundario'] }}</div>
            <div class="degree">Orientación: {{ $cv['orientacion'] }}</div>
            <div class="date">{{ $cv['fecha_inicio_secundario'] }} - {{ $cv['fecha_fin_secundario'] }}</div>
        </div>
        @if(!empty($cv['terciaria']))
        <div class="education-item">
            <div class="institution">{{ $cv['terciaria'] }}</div>
            <div class="degree">Orientación: {{ $cv['orientacion_terciaria'] }}</div>
            <div class="date">{{ $cv['fecha_inicio_terciaria'] }} - {{ $cv['fecha_fin_terciaria'] }}</div>
        </div>
        @endif
    </div>

    @if(!empty($cv['rasgos']))
    <div class="section">
        <div class="section-title">Habilidades</div>
        <div class="skills">
            @foreach($cv['rasgos'] as $rasgo)
            <span class="skill-item">{{ $rasgo['nombre'] }}</span>
            @endforeach
        </div>
    </div>
    @endif

    @if(!empty($cv['lenguajes']) || !empty($cv['otros_estudios']) || !empty($cv['datos_interes']))
    <div class="section">
        <div class="section-title">Información Adicional</div>
        @if(!empty($cv['lenguajes']))
        <p><strong>Idiomas:</strong> 
            {{ implode(', ', array_column($cv['lenguajes'],'nombre')) }}
        </p>
        @endif
        
        @if(!empty($cv['otros_estudios']))
        <p><strong>Formación Complementaria:</strong> 
            {{ implode(', ', array_column($cv['otros_estudios'], 'nombre')) }}
        </p>
        @endif
        
        @if(!empty($cv['datos_interes']))
        <p><strong>Otros datos de interés:</strong><br>
        {{ $cv['datos_interes'] }}</p>
        @endif
    </div>
    @endif
</body>
</html>
