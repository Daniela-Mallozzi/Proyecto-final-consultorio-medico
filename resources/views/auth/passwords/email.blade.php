@extends('layouts.form')

@section('content')
    <div class="p-3">
        <h6 class="mt-3">{{ __('Reset Password') }}</h6>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="row mb-3">
                <label for="email" class="col-md-12 col-form-label">{{ __('Email Address') }}</label>

                <div class="col-md-12">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email"
                        placeholder="E-Mail" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-warning">
                Procesar
            </button>
            <button type="button" class="btn btn-primary" onclick="history.back();">Cancelar</button>
        </form>
    </div>
@endsection
