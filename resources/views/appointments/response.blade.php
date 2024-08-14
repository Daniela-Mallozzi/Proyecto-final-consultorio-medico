<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Respuesta de cita</title>
    <style>
        /* Estilos para el card */
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
            background-color: #bfffff;
        }

        /* Estilos para el encabezado */
        h1 {
            text-align: center;
        }

        /* Estilos para los párrafos */
        p {
            margin-bottom: 10px;
        }

        /* Estilos para la alerta de éxito */
        .alert-success {
            background-color: #8080c0;
            color: #fafafa;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .alert-danger {
            background-color: #ff5b5b;
            color: #fafafa;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .alert-info {
            background-color: #ffff80;
            color: #fafafa;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="card">
        <h1>Mensaje de Cita {{ config('app.name') }}</h1>
        <div class="alert-{{$data['type']}}">{{$data['title']}}</div>
        <p>Nombre: {{ $data['name'] }}</p>
        <p>Correo electrónico: {{ $data['email'] }}</p>
        <p>Teléfono: {{ $data['phone'] }}</p>
        @if ($data['type'] == 'danger')
            <div class="alert-info">{{$data['msg']}}</div>
        @endif
    </div>
</body>

</html>