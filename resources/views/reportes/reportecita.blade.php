<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Citas</title>
    <style>
        /* Estilos para la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .text-danger{
            color: red;
        }
        .text-success{
            color: green;
        }
        .text-info{
            color: skyblue;
        }
    </style>
</head>
<body>
    <div>
        <table>
            <thead class="thead-light">
                <tr>
                    <th scope="col">Especialidad</th>
                    <th scope="col">Paciente</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
                @if ($oldAppointments->count() > 0)
                    @foreach ($oldAppointments as $cita)
                        <tr>
                            <td>{{ $cita->specialty->name }}</td>
                            <td>{{ $cita->patient->name }}</td>
                            <td>{{ $cita->type }}</td>
                            <td>{{ $cita->scheduled_date }}</td>
                            <td>
                                @if ($cita->status == 'Cancelada')
                                    <span class="text-danger">{{ $cita->status }}</span>
                                @elseif($cita->status == 'Atendida')
                                    <span class="text-success">{{ $cita->status }}</span>
                                @else
                                    <span class="text-info">{{ $cita->status }}</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">
                            <h4 class="text-danger">No hay registros</h4>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html>