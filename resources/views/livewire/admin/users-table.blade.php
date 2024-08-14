<div>
    <div class="mb-3">
        <input type="text" wire:model.live="search" class="form-control" placeholder="Buscar user..." />
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
                @foreach($users as $user)
                <tr>
                    <th scope="row">
                        {{ $user->name }}
                    </th>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        {{ $user->cedula }}
                    </td>
                    <td>
                        
                        <a href="{{ route('users.edit', $user) }}"
                                class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>

                            <a href="{{ route('users.destroy', $user) }}"
                                class="btn btn-sm btn-danger delete-item"><i class="fas fa-trash"></i></a>
                        
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="">
        {{ $users->links() }} <!-- Renderiza los enlaces de paginación -->
    </div>

</div>