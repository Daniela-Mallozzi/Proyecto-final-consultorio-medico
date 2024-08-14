<div>
    <div class="mb-3">
        <input type="text" wire:model.live="search" class="form-control" placeholder="Buscar citas..." />
    </div>

    <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Descripción</th>
                    <th scope="col">Especialidad</th>
                    @if ($role == 'paciente')
                        <th scope="col">Médico</th>
                    @elseif($role == 'doctor')
                        <th scope="col">Paciente</th>
                    @endif

                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Opciones</th>

                </tr>
            </thead>
            <tbody>
                @if ($confirmedAppointments->count() > 0)
                    @foreach ($confirmedAppointments as $cita)
                        <tr>
                            <th scope="row">
                                {{ $cita->description }}
                            </th>
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
                            <td>
                                {{ $cita->type }}
                            </td>
                            <td>
                                {{ $cita->status }}
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Button group">
                                    @if ($role == 'admin' || $role == 'doctor')
                                        <a href="{{ route('miscitas.show', $cita->id) }}" class="btn btn-lg btn-info"
                                            title="Ver cita"><i class='fas fa-eye'></i>
                                            
                                        </a>
                                    @endif

                                    <a href="{{ route('miscitas.cancel', $cita->id) }}" class="btn btn-lg btn-danger"
                                        title="Cancelar cita">
                                        <i class="fas fa-times-circle"></i>
                                    </a>
                                </div>

                            </td>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8" class="text-center">
                            <h4 class="text-danger">No hay registros</h4>
                        </td>
                    </tr>
                @endif

            </tbody>
        </table>
    </div>

    <div>
        {{ $confirmedAppointments->links() }}
    </div>

</div>
