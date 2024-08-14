<?php
use Illuminate\Support\Str;
?>

@extends('layouts.panel')

@section('content')

    <div class="card shadow">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Editar Paciente</h3>
                <a href="{{ route('pacientes.index') }}" class="btn btn-sm btn-danger">Regresar</a>
            </div>
            <hr>

            <form action="{{ route('pacientes.update', $patient->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="form-group col-md-12 mb-2">
                        <label for="name">Nombre del paciente</label>
                        <input type="text" name="name" placeholder="Nombre del paciente" class="form-control" value="{{ old('name', $patient->name) }}"><br>
                    </div>

                    <div class="form-group col-md-12 mb-2">
                        <label for="email">Correo electrónico</label>
                        <input type="text" name="email" placeholder="Correo electrónico" class="form-control"
                            value="{{ old('email', $patient->email) }}"><br>
                    </div>
                    <div class="form-group col-md-12 mb-2">
                        <label for="cedula">NSS</label>
                        <input type="text" name="cedula" placeholder="Número de Seguridad Social" class="form-control"
                            value="{{ old('cedula', $patient->cedula) }}"><br>
                    </div>
                    <div class="form-group col-md-12 mb-2">
                        <label for="address">Dirección</label>
                        <input type="text" name="address" placeholder="Dirección" class="form-control"
                            value="{{ old('address', $patient->address) }}"><br>
                    </div>
                    <div class="form-group col-md-12 mb-2">
                        <label for="phone">Teléfono</label>
                        <input type="text" name="phone" placeholder="Teléfono / Móvil" class="form-control"
                            value="{{ old('phone', $patient->phone) }}"><br>
                    </div>
                    <div class="form-group col-md-12 mb-2">
                        <label for="password">Contraseña (Opcional)</label>
                        <input type="text" name="password" placeholder="Contraseña" class="form-control"><br>
                    </div>

                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-sm btn-primary">Guardar cambios</button>
                    </div>
                </div>

            </form>
        </div>

    </div>

@endsection
