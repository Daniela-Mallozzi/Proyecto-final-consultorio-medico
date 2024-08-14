@extends('layouts.panel')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0"><i class='far fa-question-circle' style='font-size:28px;color:red'> Cancelar cita</i></h3>
                <a href="{{ route('miscitas.index') }}" class="btn btn-sm btn-info">
                    Regresar
                </a>
            </div>
            <hr>

            @if ($role == 'paciente')
                <p>Cancelarás cita reservada con el médico <b>{{ $appointment->doctor->name }}</b>
                    (Especialidad <b>{{ $appointment->specialty->name }}</b> )
                    para el día <b>{{ $appointment->scheduled_date }}</b>.
                </p>
            @elseif($role == 'doctor')
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    Se cancelará la cita médica del paciente <strong>{{ $appointment->patient->name }}</strong>
                    (especialidad <b>{{ $appointment->specialty->name }}</b> )
                    para el día <b>{{ $appointment->scheduled_date }}</b>
                    , con hora <b>{{ $appointment->scheduled_time_12 }}</b>.
                </div>

            @else
                <p>Se cancelará la cita médica del paciente <b>{{ $appointment->patient->name }}</b>
                    que será atendido por el Doctor <b>{{ $appointment->doctor->name }}</b>
                    (especialidad <b>{{ $appointment->specialty->name }}</b> )
                    para el día <b>{{ $appointment->scheduled_date }}</b>
                    , y hora <b>{{ $appointment->scheduled_time_12 }}</b>.
                </p>
            @endif

            <form action="{{ route('miscitas.cancel', $appointment->id) }}" method="POST">
                @csrf
                <div class="form-group mb-3 text-center">
                    <label for="justification" class="text-danger">Motivos de la cancelación:</label>
                    <div><br></div>
                    <textarea name="justification" id="justification" placeholder="Agrega un motivo del porqué de la cancelación" rows="10"
                        class="form-control" required></textarea>
                </div>
                <div class="text-center">
                <button class="btn btn-lg btn-danger" type="submit">Cancelar cita</button>
                </div>

            </form>

        </div>

    </div>
@endsection
