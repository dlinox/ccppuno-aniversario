<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket para Evento</title>
    <style>
        .ticket {
            border: 2px dashed #000;
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        .event-name {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 150px;
            /* Puedes ajustar el tamaño según necesites */
        }
    </style>
</head>

<body>
    <div class="ticket">

        <div class="logo">
            <img src="data:image/png;base64,{{ $logoData }}" alt="Logo del Evento">
        </div>

        <div class="event-name">Evento de aniversario</div>
        <div class="qr-code">
            <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(150)->generate('$token')) !!} ">
        </div>
        <div class="participant-info">
            Fecha: 11 Septiembre 2023<br>
            Lugar: Estadio Nacional
        </div>
    </div>
</body>

</html>