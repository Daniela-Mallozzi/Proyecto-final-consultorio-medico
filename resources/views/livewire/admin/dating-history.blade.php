<div>
    <div class="mb-3">
        <input type="text" wire:model.live="search" class="form-control" placeholder="Buscar citas..." />
    </div>

    <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Especialidad</th>
                    <th scope="col">Paciente</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Opciones</th>

                </tr>
            </thead>
            <tbody>
                @if ($oldAppointments->count() > 0)
                    @foreach ($oldAppointments as $cita)
                        <tr>

                            <td>
                                {{ $cita->specialty->name }}
                            </td>
                            <td>
                                {{ $cita->patient->name }}
                            </td>
                            <td>
                                {{ $cita->type }}
                            </td>
                            <td>
                                {{ $cita->scheduled_date }}
                            </td>
                            <td>
                                @if ($cita->status == 'Cancelada')
                                    <span class="badge bg-danger">{{ $cita->status }}</span>
                                @elseif($cita->status == 'Atendida')
                                    <span class="badge bg-success">{{ $cita->status }}</span>
                                @else
                                    <span class="badge bg-info">{{ $cita->status }}</span>
                                @endif
                            </td>
                            <td>

                                <a href="{{ route('miscitas.show', $cita->id) }}" class="btn btn-info btn-sm">
                                    Ver
                                </a>

                            </td>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center">
                            <h4 class="text-danger">No hay registros</h4>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div>
        {{ $oldAppointments->links() }}
    </div>
</div>
