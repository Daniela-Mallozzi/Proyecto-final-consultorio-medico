@extends('layouts.panel')

@section('content')

    <div class="card">

        <div class="card-body">
            
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Editar Medios de Contacto</h3>
            </div>

            <hr>

            <form action="{{ route('contact.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="form-group col-md-6 mb-2">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $contact->name) }}">
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <label for="email">Correo electrónico</label>
                        <input type="text" name="email" class="form-control"
                            value="{{ old('email', $contact->email) }}">
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <label for="cedula">Cédula</label>
                        <input type="text" name="cedula" class="form-control"
                            value="{{ old('cedula', $contact->cedula) }}">
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <label for="address">Dirección</label>
                        <input type="text" name="address" class="form-control"
                            value="{{ old('address', $contact->address) }}">
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <label for="phone">Teléfono / Móvil</label>
                        <input type="number" name="phone" class="form-control"
                            value="{{ old('phone', $contact->phone) }}">
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <label for="message">Mensaje</label>
                        <textarea id="message" class="form-control" name="message" rows="3" placeholder="Mensaje">{{ old('message', $contact->message) }}</textarea>
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <label for="facebook">URL Facebook</label>
                        <input type="text" name="facebook" class="form-control"
                            value="{{ old('facebook', $contact->facebook) }}">
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <label for="youtube">URL Youtube</label>
                        <input type="text" name="youtube" class="form-control"
                            value="{{ old('youtube', $contact->youtube) }}">
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <label for="twitter">URL X (Twitter)</label>
                        <input type="text" name="twitter" class="form-control"
                            value="{{ old('twitter', $contact->twitter) }}">
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <label for="github">URL Github</label>
                        <input type="text" name="github" class="form-control"
                            value="{{ old('github', $contact->github) }}">
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <label for="pinterest">URL Pinterest</label>
                        <input type="text" name="pinterest" class="form-control"
                            value="{{ old('pinterest', $contact->pinterest) }}">
                    </div>

                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-sm btn-primary">Guardar cambios</button>
                    </div>

                </div>
            </form>
        </div>

    </div>

@endsection