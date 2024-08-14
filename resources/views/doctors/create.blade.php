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
                <h3 class="mb-5"><br><i class='fas fa-plus-circle' style='font-size:28px;color:green'> Agregar Nuevo médico</i></h3>
                <a href="{{ route('medicos.index') }}" class="btn btn-sm btn-danger">Regresar</a>
            </div>

            <hr>

            <form action="{{ route('medicos.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 form-group mb-2">
                        <label for="name">Nombre del médico</label>
                        <input type="text" name="name" class="form-control" placeholder="Nombre del médico"
                            value="{{ old('name') }}">
                    </div>

                    <div class="col-md-6 form-group mb-2">
                        <label for="specialties">Especialidades</label>
                        <select name="specialties[]" data-placeholder="Seleccionar Especialidad" id="specialties"
                            class="form-select" multiple>
                            @foreach ($specialties as $especialidad)
                                <option value="{{ $especialidad->id }}">{{ $especialidad->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 form-group mb-2">
                        <label for="email">Correo electrónico</label>
                        <input type="text" name="email" class="form-control" placeholder="Correo electrónico"
                            value="{{ old('email') }}">
                    </div>

                    <div class="col-md-6 form-group mb-2">
                        <label for="cedula">Cédula Profesional</label>
                        <input type="text" name="cedula" class="form-control" placeholder="Cédula"
                            value="{{ old('cedula') }}">
                    </div>

                    <div class="col-md-6 form-group mb-2">
                        <label for="address">Dirección</label>
                        <input type="text" name="address" class="form-control" placeholder="Dirección"
                            value="{{ old('address') }}">
                    </div>

                    <div class="col-md-6 form-group mb-2">
                        <label for="phone">Teléfono / Móvil</label>
                        <input type="text" name="phone" class="form-control" placeholder="Teléfono / Móvil"
                            value="{{ old('phone') }}">
                    </div>

                    <div class="col-md-6 form-group mb-2">
                        <label for="password">Contraseña</label>
                        <input type="text" name="password" class="form-control"
                            value="{{ old('password', Str::random(8)) }}">
                    </div>
                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-sm btn-primary">Crear</button>
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
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
        });
    </script>
@endsection
