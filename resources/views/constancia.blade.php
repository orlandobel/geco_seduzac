<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ public_path('customcss/formato.css') }}">
    <title>Constancia</title>
</head>
<body>
    <section>
        <div class="sheet">
            <img src="{{ public_path('storage/template/template.png') }}" alt="" />
            <label class="participante"> {{ $p->nombre }} {{ $p->aPaterno }} {{ $p->aMaterno }} </label>
            <img src="{{ public_path('qr.svg') }}" class="qr" alt="" />
        </div>

    </section>
</body>
</html>