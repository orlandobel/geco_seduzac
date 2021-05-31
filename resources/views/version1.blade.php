<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ public_path('customcss/version1.css') }}">
    <title>version1</title>
</head>
<body >
    <img src="{{ public_path('img/version1/bg.png') }}" alt="" class="bg">
    <div class="center arial">
        <img src="{{ public_path('img/version1/gob.png') }}" alt="" class="gob">
        <label for="" class=" otorga">otroga la presente</label>
        <label for="" class="constancia black">CONSTANCIA</label>
        <table class="lucida txt-14 mb-175">
            <tr>
                <td>
                    A:
                </td>
                <td class="participante-area center">
                    <b>{{ $p->nombre }} {{ $p->aPaterno }} {{ $p->aMaterno }}</b>
                </td>
            </tr>
        </table>
        <label for="" class="mb-175 txt-14">
            Por su participación en el diseño e impartir el taller en línea <br/>
            <b>"{{ $c->nombre }}"</b>, <br> 
            con una duración de {{ $c->duracion }} horas de trabajo académico. 
        </label>
        <label for="" class="fecha">Zacatecas, Zac., {{ $date }}</label>
        
        <img src="{{ public_path('qr.svg')}}" alt="" class="qr-img">
    </div>
    <img src="{{ public_path('img/version1/footer.png') }}" alt="" class="footer">
    
</body>
</html>