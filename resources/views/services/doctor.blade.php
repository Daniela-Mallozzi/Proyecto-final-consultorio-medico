@extends('layouts.app')

@section('content')
    <!--Page Title-->
    <section class="page-title text-center"
        style="background-image:url({{ $doctor->picture ? Storage::url($doctor->picture) : asset('principal/images/background/3.jpg') }});">
        <div class="container">
            <div class="title-text">
                <h1>{{ $doctor->name }}</h1>
                <ul class="title-menu clearfix">
                    <li>
                        <a href="{{ route('welcome') }}">Inicio &nbsp;/</a>
                    </li>
                    <li>{{ $doctor->name }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <section class="service-overview section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="content-block">
                        <h2>{{ $doctor->name }}</h2>

                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Contactos</h5>
                                <hr>
                                <div class="mb-3">
                                    <img class="img-thumbnail"
                                        src="{{ $doctor->picture ? Storage::url($doctor->picture) : asset('principal/images/background/3.jpg') }}"
                                        alt="">
                                </div>
                                <div class="mb-3">
                                    <i class="fas fa-phone"></i> <b>Teléfono:</b> <span>{{ $doctor->phone }}</span>
                                </div>
                                <div class="mb-3">
                                    <i class="fas fa-envelope"></i> <b>Correo:</b> <span>{{ $doctor->email }}</span>
                                </div>
                                <div>
                                    <i class="fas fa-home"></i> <b>Dirección:</b> <span>{{ $doctor->address }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h2>Especialidad</h2>
                    <hr>
                    <div class="hero-slider">
                        @foreach ($doctor->specialties as $specialt)
                            <!-- Slider Item -->
                            <div class="slider-item"
                                style="background-image:url({{ $specialt->image ? Storage::url($specialt->image) : asset('principal/images/gallery/1.jpg') }})">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <!-- Slide Content Start -->
                                            <div class="content style text-center">
                                                <h4 class="text-white text-bold mb-2" data-animation-in="slideInLeft">
                                                    {{ $specialt->name }}</h4>
                                            </div>
                                            <!-- Slide Content End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
