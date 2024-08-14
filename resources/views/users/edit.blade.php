<?php
use Illuminate\Support\Str;
?>

@extends('layouts.panel')

@section('content')

    <div class="card shadow">

        <div class="card-body">
            
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Editar Usuario</h3>
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-danger">Regresar</a>
            </div>

            <hr>

            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="form-group col-md-6 mb-2">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                    </div>

                    <div class="form-group col-md-6 mb-2">
                        <label for="email">Correo electrónico</label>
                        <input type="text" name="email" class="form-control"
                            value="{{ old('email', $user->email) }}">
                    </div>
                    <div class="form-group col-md-6 mb-2">
                        <label for="cedula">Cédula</label>
                        <input type="text" name="cedula" class="form-control"
                            value="{{ old('cedula', $user->cedula) }}">
                    </div>
                    <div class="form-group col-md-6 mb-2">
                        <label for="address">Dirección</label>
                        <input type="text" name="address" class="form-control"
                            value="{{ old('address', $user->address) }}">
                    </div>
                    <div class="form-group col-md-6 mb-2">
                        <label for="phone">Teléfono / Móvil</label>
                        <input type="text" name="phone" class="form-control"
                            value="{{ old('phone', $user->phone) }}">
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
