@extends('layouts.form')

@section('title', 'Iniciar sesión')

@section('content')

    <div class="p-3">
        <div class="text-center">
            <img src="{{ asset('assets/images/logo2.png') }}" alt="logotipo">
        </div>
        <h2 class="mt-3 text-center text-danger">&#128272; ¡Iniciar Sesión!</h2>
        <form class="mt-4" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row">
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
                <div class="btn-group-toggle mb-2" data-toggle="buttons">
                    <label class="btn btn-oultine-primary">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar sesión
                    </label>
                </div>
                <div class="text-end mb-2 text-center">
                    <a href="{{ route('password.request') }}" class="text-warning">¿Olvidaste tu contraseña?</a>
                </div>
                <div class="col-lg-12 text-center">
                    <button type="submit" class="btn w-500 btn-dark btn-lg">Entrar</button>
                </div>
                <div class="col-lg-12 text-center mt-5">
                    ¿No tienes una cuenta?, <a href="{{ route('register') }}" class="text-success">Regístrate &#128072;!!</a>
                </div>
            </div>
        </form>
    </div>

@endsection
