<?php
use Illuminate\Support\Str;
?>

@extends('layouts.panel')

@section('content')

    <div class="card shadow">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Nuevo usuario</h3>
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-danger">Regresar</a>
            </div>

            <hr>

            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 form-group mb-2">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" class="form-control" placeholder="Nombre"
                            value="{{ old('name') }}">
                    </div>

                    <div class="col-md-6 form-group mb-2">
                        <label for="email">Correo electrónico</label>
                        <input type="text" name="email" class="form-control" placeholder="Correo electrónico"
                            value="{{ old('email') }}">
                    </div>

                    <div class="col-md-6 form-group mb-2">
                        <label for="cedula">Cédula</label>
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