<div>
    <div class="mb-3">
        <input type="text" wire:model.live="search" class="form-control" placeholder="Buscar especialidad..." />
    </div>

    <div class="table-responsive">
        <table class="table align-items-center" style="width: 100%">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($specialties as $especialidad)
                    <tr>
                        <th scope="row">
                            {{ $especialidad->name }}
                        </th>
                        <td>
                            <img src="{{ Storage::url($especialidad->image) }}" width="50" alt="{{ $especialidad->name }}">
                        </td>
                        <td>
                            <a href="{{ route('specialties.edit', $especialidad) }}"
                                class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>

                            <a href="{{ route('specialties.destroy', $especialidad) }}"
                                class="btn btn-sm btn-danger delete-item"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="">
        {{ $specialties->links() }} <!-- Renderiza los enlaces de paginación -->
    </div>

</div>
