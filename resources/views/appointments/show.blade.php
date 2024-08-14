@extends('layouts.panel')

@section('content')

    <div class="card">
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0"><i class='fas fa-clipboard-check'></i> Cita #{{ $appointment->id }}</h3>
                <a href="{{ url('/miscitas') }}" class="btn btn-lg btn-danger"><i class='fas fa-arrow-left'></i> Regresar</a>
            </div>

            <hr>

            <ul class="list-group">
                <li class="list-group-item">
                    <strong>Fecha:</strong> {{ $appointment->scheduled_date }}
                </li>
                <li class="list-group-item">
                    <strong>Hora Solicitada:</strong> {{ $appointment->scheduled_time_12 }}
                </li>

                @if ($role == 'paciente' || $role == 'admin')
                    <li class="list-group-item">
                        <strong>Doctor:</strong> {{ $appointment->doctor->name }}
                    </li>
                @endif
                @if ($role == 'doctor' || $role == 'admin')
                    <li class="list-group-item">
                        <strong>Paciente:</strong> {{ $appointment->patient->name }}
                    </li>
                @endif

                <li class="list-group-item">
                    <strong>Especialidad:</strong> {{ $appointment->specialty->name }}
                </li>
                <li class="list-group-item">
                    <strong>Tipo de Servicio:</strong> {{ $appointment->type }}
                </li>
                <li class="list-group-item">
                    <strong>Estatus: </strong>
                    @if ($appointment->status == 'Cancelada')
                        <span class="badge bg-danger">Cancelada</span>
                    @else
                        <span class="badge bg-primary">{{ $appointment->status }}</span>
                    @endif
                </li>
                <li class="list-group-item">
                    <strong>Notas: </strong> {{ $appointment->description }}
                </li>
            </ul>

            @if ($appointment->status == 'Cancelada')
                <div class="alert alert-info">
                    <h3>Detalles de la cancelación</h3>
                    @if ($appointment->cancellation)
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Fecha de cancelación:</strong> {{ $appointment->cancellation->created_at }}
                            </li>
                            <li class="list-group-item">
                                <strong>La cita fue cancelada por:</strong>
                                {{ $appointment->cancellation->cancelled_by->name }}
                            </li>
                            <li class="list-group-item">
                                <strong>Motivo de la cancelación:</strong> {{ $appointment->cancellation->justification }}
                            </li>
                        </ul>
                    @else
                        <ul class="list-group">
                            <li class="list-group-item">La cita fue cancelada antes de su confirmación.</li>
                        </ul>
                    @endif
                </div>
            @endif

        </div>
        @if ($appointment->status == 'Confirmada' && auth()->user()->role == 'doctor')
            <div class="card-footer text-center">
                <form id="confirmForm" action="{{ route('miscitas.atender', $appointment->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <!-- //<button id="confirmButton" class="btn btn-lg btn-success" type="submit">Cita Atendida</button> -->
                    <button id="confirmButton" class="btn btn-lg btn-success" type="submit" style='font-size:20px'>Cita Atendida <i class='far fa-check-circle'></i></button>
                </form>
            </div>
        @endif
    </div>

@endsection

@section('scripts')
    @if ($appointment->status == 'Confirmada' && auth()->user()->role == 'doctor')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('confirmButton').addEventListener('click', function(event) {
                    event.preventDefault(); // Evita que el formulario se envíe automáticamente

                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: 'Confirmas que todo está bien?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: 'info',
                        cancelButtonColor: 'red',
                        confirmButtonText: 'Sí, marcar como atendida'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('confirmForm')
                                .submit(); // Envía el formulario si el usuario confirma
                        }
                    });
                });
            });
        </script>
    @endif
@endsection
