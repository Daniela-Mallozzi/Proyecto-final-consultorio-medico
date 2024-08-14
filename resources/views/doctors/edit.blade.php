<?php
use Illuminate\Support\Str;
?>

@extends('layouts.panel')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
@endsection

@section('content')

    <div class="card shadow">

        <div class="card-body">
            
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Editar médico</h3>
                <a href="{{ route('medicos.index') }}" class="btn btn-sm btn-danger">Regresar</a>
            </div>

            <hr>

            <form action="{{ route('medicos.update', $doctor->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="form-group col-md-6 mb-2">
                        <label for="name">Nombre del médico</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $doctor->name) }}">
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <label for="specialties">Especialidades</label>
                        <select name="specialties[]" id="specialties" class="form-control selectpicker"
                            data-style="btn-primary" title="Seleccionar especialidades" multiple required>
                            @foreach ($specialties as $especialidad)
                                <option value="{{ $especialidad->id }}" @if ($specialty_ids->contains($especialidad->id)) selected @endif>
                                    {{ $especialidad->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <label for="email">Correo electrónico</label>
                        <input type="text" name="email" class="form-control"
                            value="{{ old('email', $doctor->email) }}">
                    </div>
                    <div class="form-group col-md-6 mb-2">
                        <label for="cedula">Cédula</label>
                        <input type="text" name="cedula" class="form-control"
                            value="{{ old('cedula', $doctor->cedula) }}">
                    </div>
                    <div class="form-group col-md-6 mb-2">
                        <label for="address">Dirección</label>
                        <input type="text" name="address" class="form-control"
                            value="{{ old('address', $doctor->address) }}">
                    </div>
                    <div class="form-group col-md-6 mb-2">
                        <label for="phone">Teléfono / Móvil</label>
                        <input type="text" name="phone" class="form-control"
                            value="{{ old('phone', $doctor->phone) }}">
                    </div>
                    <div class="form-group col-md-6 mb-2">
                        <label for="password">Contraseña (Opcional)</label>
                        <input type="text" name="password" class="form-control">
                    </div>
                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-sm btn-primary">Guardar cambios</button>
                    </div>

                </div>
            </form>
        </div>

    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('#specialties').select2({
            placeholder: 'Seleccionar especialidades',
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
        });
    </script>
@endsection
