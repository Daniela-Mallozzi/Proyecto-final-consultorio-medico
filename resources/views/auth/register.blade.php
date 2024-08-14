@extends('layouts.form')

@section('title', 'Regístrate')

@section('content')

    <div class="p-3">
        <div class="text-center">
            <img src="{{ asset('assets/images/logo2.png') }}" alt="logotipo">
        </div>
        <h2 class="mt-3 text-center text-success">¡Regístrate! &#128075;</h2>
        <form class="mt-4" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group mb-3">
                        <label class="form-label text-dark" for="name">&#128073; Nombre</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="Nombre"
                            value="{{ old('name') }}">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group mb-3">
                        <label class="form-label text-dark" for="email">&#128236; Correo Electrónico</label>
                        <input class="form-control" id="email" name="email" type="email"
                            placeholder="Correo Electrónico" value="{{ old('email') }}">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group mb-3">
                        <label class="form-label text-dark" for="password">&#128273; Contraseña</label>
                        <input class="form-control" id="password" name="password" type="password" placeholder="Contraseña">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group mb-3">
                        <label class="form-label text-dark" for="password_confirmation">&#128270; Confirmar Contraseña</label>
                        <input class="form-control" id="password_confirmation" name="password_confirmation" type="password"
                            placeholder="Confirmar Contraseña">
                    </div>
                </div>

                <div class="col-lg-12 text-center">
                    <button type="submit" class="btn w-100 btn-danger">Registrarse</button>
                </div>
                <div class="col-lg-12 text-center mt-5 text-info">
                    ¿Ya tienes cuenta? <a href="{{ route('login') }}" class="text-danger">Acceder &#128072;</a>
                </div>
            </div>
        </form>
    </div>

@endsection
