<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ public_path('customcss/vercion2.css') }}">
    <title>version2</title>
</head>
<body>
    <img src="{{ public_path('img/version2/bg.png') }}" alt="" class="bg">
    <div>
        <img src="{{ public_path('img/version2/sep.png') }}" alt="" class="sep">
        <img src="{{ public_path('img/version2/gob.png') }}" alt="" class="gob">
        <img src="{{ public_path('img/version2/dgfc.png') }}" alt="" class="dgfc">
    </div>
    <div class="center lucida-12">
        <div class="body">
            <label for="" >LA DIRECCIÓN GENERAL DE FORMACIÓN CONTINUA, ACTUALIZACIÓN Y</label>
            <label for="">DESARROLLO PROFESIONAL DE MAESTROS DE EDUCACIÓN BÁSICA, A TRAVÉS</label>
            <label for="">DE LA SECRETARÍA DE EDUCACIÓN DE ZACATECAS</label>
            <label for="" class="mg-1">Otorga la presente</label>
            <label for="" class="constancia black">CONSTANCIA</label>
            <div class="mg-1">
                <table class="narrow-22">
                    <tr>
                        <td>A: </td>
                        <td class="black">{{ $p->nombre }} {{ $p->aPaterno }} {{ $p->aMaterno }}</td>
                    </tr>
                </table>
            </div>
            
            <table class="center">
                <tr>
                    <td>Por su participación en el curso en línea</td>
                </tr>
                <tr>
                    <td  class="black">{{ $c->nombre }}</td>
                </tr>
                <tr>
                    <td>de la Colección <b>{{ $g }}</b></td>
                </tr>
                <tr>
                    <td>con una duración de {{ $c->duracion }} horas, durante el periodo</td>
                </tr>
                <tr>
                    <td >del {{ $c->inicio }} al {{ $c->final }}</td>
                </tr>
            </table>
    
            <label for="" class="black firma">
                Mtro. Daniel Rodríguez Lemus<br/>
                Subsecretario académico
            </label>
        </div>
    </div>

    <img src="{{ public_path('img/version2/footer.png') }}" alt="" class="footer">
</body>
</html>