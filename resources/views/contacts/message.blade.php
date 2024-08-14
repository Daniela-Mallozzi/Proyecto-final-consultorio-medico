<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario de Contacto</title>
    <style>
        /* Estilos para el card */
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
            background-color: #f9f9f9;
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
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="card">
        <h1>Formulario de Contacto</h1>
        <div class="alert-success">Mensaje enviado con éxito</div>
        <p>Nombre: {{ $data['name'] }}</p>
        <p>Correo electrónico: {{ $data['email'] }}</p>
        <p>Teléfono: {{ $data['phone'] }}</p>
        <p>Mensaje: {{ $data['message'] }}</p>
    </div>
</body>

</html>