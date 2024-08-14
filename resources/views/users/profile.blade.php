@extends('layouts.panel')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <label for="image" style="cursor: pointer">
                                <img class="rounded-circle mt-10" id="previewImage" width="250px"
                                    src="{{ $user->picture ? Storage::url($user->picture) : asset('assets/images/users/profile-pic.jpg') }}">
                                <input type="file" name="image" class="d-none" id="image">
                            </label>
                            <br>
                            <span class="font-weight-bold text-info">{{ $user->name }}</span>
                            <br>
                            <span
                                class="text-black-50">{{ $user->email }}</span><span>
                            </span>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-9 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Editar Perfil</h4>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12"><label class="labels">Nombre</label>
                                    <input type="text" class="form-control" name="name" placeholder="Nombre"
                                        value="{{ old('name', $user->name) }}">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Correo</label>
                                    <input type="text" class="form-control" name="email"
                                        value="{{ old('email', $user->email) }}" placeholder="Correo Electrónico">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12 mb-3"><label class="labels">Teléfono</label>
                                    <input type="number" name="phone" class="form-control" placeholder="Celular/Teléfono"
                                        value="{{ old('phone', $user->phone) }}">
                                </div>
                                <div class="col-md-12 mb-3"><label class="labels">Cédula</label>
                                    <input type="text" class="form-control" name="cedula" placeholder="Cédula"
                                        value="{{ old('cedula', $user->cedula) }}">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Dirección</label>
                                    <input type="text" name="address" class="form-control" placeholder="Direccón"
                                        value="{{ old('address', $user->address) }}">
                                </div>
                            </div>
                            <div class="mt-5 text-end">
                                <button class="btn btn-primary profile-button" type="submit">Guardar
                                    Cambios
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{route('profile.updatePass')}}" method="post">
                @csrf
                @method('PUT')
                <div class="col-lg-12">
                    <div class="form-group mb-3">
                        <label class="form-label text-dark" for="password">Contraseña</label>
                        <input class="form-control" id="password" name="password" type="password" placeholder="Contraseña">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group mb-3">
                        <label class="form-label text-dark" for="password_confirmation">Confirmar Contraseña</label>
                        <input class="form-control" id="password_confirmation" name="password_confirmation" type="password"
                            placeholder="Confirmar Contraseña">
                    </div>
                </div>
                <div class="mt-5 text-end">
                    <button class="btn btn-primary profile-button" type="submit">Guardar
                        Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.getElementById('image').onchange = function(evt) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImage').src = e.target.result;
                document.getElementById('previewImage').style.display = 'block';
            };
            reader.readAsDataURL(this.files[0]);
        };
    </script>
@endsection
