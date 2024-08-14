<div>

    <div class="mb-3">
        <input type="text" wire:model.live="search" class="form-control" placeholder="Buscar citas..." />
    </div>

    <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Tipo</th>
                    <th scope="col">Especialidad</th>
                    @if ($role == 'paciente')
                        <th scope="col">Médico</th>
                    @elseif($role == 'doctor')
                        <th scope="col">Paciente</th>
                    @endif
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>

            <tbody>
                @if ($pendingAppointments->count() > 0)
                    @foreach ($pendingAppointments as $cita)
                        <tr>
                        <td>
                            {{ $cita->type }}
                            </td>
                            <td>
                                {{ $cita->specialty->name }}
                            </td>
                            @if ($role == 'paciente')
                                <td>
                                    {{ $cita->doctor->name }}
                                </td>
                            @elseif($role == 'doctor')
                                <td>
                                    {{ $cita->patient->name }}
                                </td>
                            @endif
                            <td>
                                {{ $cita->scheduled_date }}
                            </td>

                            <td>
                                {{ $cita->Scheduled_Time_12 }}
                            </td>

                            <th scope="row">
                                {{ $cita->description }}
                            </th>
                           

                            <td>
                                @if ($role == 'admin')
                                    <a href="{{ route('miscitas.show', $cita->id) }}" class="btn btn-sm btn-info"
                                        title="Ver cita">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                @endif

                                @if ($role == 'doctor' || $role == 'admin')
                                    <form action="{{ route('miscitas.confirm', $cita->id) }}"  id="confirm-{{ $cita->id }}" method="POST"
                                        class="d-inline-block confirm-cita">
                                        @csrf

                                        <button type="button" class="btn btn-sm btn-success confirmButton"
                                            title="Confirmar cita" data-cita-id="{{ $cita->id }}">
                                            <i class="fas fa-check-circle"></i>
                                        </button>
                                    </form>

                                    <a href="{{ route('miscitas.cancel', $cita->id) }}"class="btn btn-sm btn-danger"
                                        title="Cancelar cita">
                                        <i class="fas fa-times-circle"></i>
                                    </a>
                                @else
                                    <form action="{{ route('miscitas.cancel', $cita->id) }}" method="POST"
                                        class="d-inline-block">
                                        @csrf

                                        <button type="submit" class="btn btn-sm btn-danger" title="Cancelar cita">
                                            <i class="fas fa-times-circle"></i>
                                        </button>

                                    </form>
                                @endif



                            </td>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="text-center">
                            <h4 class="text-danger">No hay registros</h4>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div>
        {{ $pendingAppointments->links() }}
    </div>

    <script>
        document.querySelectorAll('.confirmButton').forEach(button => {
            button.addEventListener('click', function() {
                const citaId = this.getAttribute('data-cita-id');

                Swal.fire({
                    title: 'Confirmar Cita?',
                    text: "Estás a punto de confirmar esta cita.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: 'success',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, confirmar cita'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Buscar el formulario correspondiente
                        const form = document.querySelector('#confirm-' + citaId) 
                        if (form) {
                            // Si se encontró el formulario, enviarlo
                            form.submit();
                        } else {
                            // Si no se encontró el formulario, mostrar un mensaje de error
                            console.error('No se encontró el formulario correspondiente.');
                        }
                    }
                });
            });
        });
    </script>


</div>
