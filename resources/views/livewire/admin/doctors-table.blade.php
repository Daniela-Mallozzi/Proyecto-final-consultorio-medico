<div>
    <div class="mb-3">
        <input type="text" wire:model.live="search" class="form-control" placeholder="Buscar doctor..." />
    </div>

    <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Cédula</th>
                    <th scope="col">Opciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($doctors as $doctor)
                    <tr>
                        <th scope="row">
                            {{ $doctor->name }}
                        </th>
                        <td>
                            {{ $doctor->email }}
                        </td>
                        <td>
                            {{ $doctor->cedula }}
                        </td>
                        <td>
                            <a href="{{ route('medicos.edit', $doctor) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>

                            <a href="{{ route('medicos.destroy', $doctor) }}"
                                class="btn btn-sm btn-danger delete-item"><i class="fas fa-trash"></i></a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="">
        {{ $doctors->links() }} <!-- Renderiza los enlaces de paginación -->
    </div>

</div>
