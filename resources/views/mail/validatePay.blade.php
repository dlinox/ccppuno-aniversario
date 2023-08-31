<!DOCTYPE html>
<html>

<head>
  <title>Detalles de Venta</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; color: #333333;">

  <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);">

    <h2 style="padding-bottom: 10px;">Detalles de Venta</h1>
    <br>
    <br>
    <h2 style="border-bottom: 1px solid #e1e1e1; padding-bottom: 10px;">Detalles de Venta</h2>
    <p>
      ID de Venta: {{ $sale['id'] }}<br>
      Cantidad: {{ $sale['quantity'] }}<br>
      Total: S/. {{ $sale['total'] }}<br>
      Fecha: {{ $sale['date'] }}<br>
      Estado: {{ $sale['status'] }}<br>
      URL Base: {{ url('/') }}
    </p>

    <h2 style="border-bottom: 1px solid #e1e1e1; padding-bottom: 10px; margin-top: 20px;">Detalles del Cliente</h2>
    <p>
      Nombre: {{ $client['name'] }} {{ $client['paternalSurname'] }} {{ $client['maternalSurname'] }}<br>
      Número de Documento: {{ $client['documentNumber'] }}<br>
      Teléfono: {{ $client['phoneNumber'] }}<br>
      Email: {{ $client['email'] }}
    </p>

    <h2 style="border-bottom: 1px solid #e1e1e1; padding-bottom: 10px; margin-top: 20px;">Tickets</h2>
    @foreach($tickets as $ticket)
    <div style="border: 1px solid #e1e1e1; padding: 10px; margin: 10px 0; border-radius: 5px;">
      ID: {{ $ticket['id'] }}
      <br>
      <br>
      <br>

      @if($ticket['ticketId'] == 1)
      BOLETO: HABIL
      <br>
      <br>
      <br>

      <a href="{{ route('share', ['token' => $ticket['token']]) }}" style="background-color: #007BFF; padding: 10px 15px; color: white; text-decoration: none; border-radius: 3px;">Ver  Boleto </a>
      @elseif($ticket['ticketId'] == 2)
      BOLETO: INHABIL PUBLICO EN GENERAL
      <br>
      <br>
      <br>

      <a href="{{ route('share', ['token' => $ticket['token']]) }}" style="background-color: #007BFF; padding: 10px 15px; color: white; text-decoration: none; border-radius: 3px;">Ver  Boleto</a>
      @endif
    </div>
    @endforeach
  </div>

</body>

</html>