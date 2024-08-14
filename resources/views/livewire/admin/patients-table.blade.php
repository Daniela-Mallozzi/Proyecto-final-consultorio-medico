<div>
    <div class="mb-3">
        <input type="text" wire:model.live="search" class="form-control" placeholder="Buscar pacientes..." />
    </div>

    <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Opciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $paciente)
                    <tr>
                        <th scope="row">
                            {{ $paciente->name }}
                        </th>
                        <td>
                            {{ $paciente->email }}
                        </td>
                        <td>
                            {{ $paciente->phone }}
                        </td>
                        <td>
                            <a href="{{ route('pacientes.edit', $paciente) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>

                            <a href="{{ route('pacientes.destroy', $paciente) }}"
                                class="btn btn-sm btn-danger delete-item"><i class="fas fa-trash"></i></a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{ $patients->links() }}
    </div>
</div>
