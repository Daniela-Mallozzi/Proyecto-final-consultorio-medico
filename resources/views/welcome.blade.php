@extends('layouts.app')

@section('content')
    <!--=================================
                =            Page Slider            =
                ==================================-->
    <div class="hero-slider">
        @foreach ($sliders as $slider)
            <!-- Slider Item -->
            <div class="slider-item" style="background-image:url({{ Storage::url($slider->image) }})">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- Slide Content Start -->
                            <div class="content style text-center">
                                <h2 class="text-white text-bold mb-2 h2" data-animation-in="slideInLeft">
                                    {{ $slider->title }}</h2>
                                <p class="tag-text mb-4" data-animation-in="slideInRight">{{ $slider->subtitle }}
                                </p>
                                <a href="{{ $slider->url }}" class="btn btn-main btn-white" data-animation-in="slideInLeft"
                                    data-duration-in="1.2">Explorar</a>
                            </div>
                            <!-- Slide Content End -->
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!--====  End of Page Slider  ====-->

    <section class="cta" style="background-attachment: fixed; background-size: cover; background-image: url({{ asset('principal/images/services.jpg') }});">
        <div class="container">
            <div class="cta-block row no-gutters">
                <div class="col-lg-4 col-md-6 emmergency item">
                    <i class="fa fa-phone"></i>
                    <h2>CASOS DE EMERGENCIA</h2>
                    <a href="tel:1-800-123-4567">1-800-123-4567</a>
                    <p>En caso de emergencia, estamos disponibles las 24 horas del día, los 7 días de la semana.</p>
                </div>
                <div class="col-lg-4 col-md-6 top-doctor item">
                    <i class="fa fa-stethoscope"></i>
                    <h2>Servicio las 24 horas</h2>
                    <p>Nuestro equipo médico está disponible para atenderte en cualquier momento. Calidad y compromiso
                        garantizados.</p>
                    <div class="text-center">
                        <a href="{{ route('services.index') }}" class="btn btn-main">Leer más</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 working-time item">
                    <i class="fas fa-hourglass"></i>
                    <h2>Horas Laborales</h2>
                    <ul class="w-hours">
                        <li>Lunes - Viernes - <span>8:00 - 17:00</span></li>
                        <li>Sábado - <span>9:00 - 13:00</span></li>
                        <li>Domingo - <span>Cerrado</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>



    <!--Service Section-->
    <section class="service-section bg-gray section">
        <div class="container">
            <div class="section-title text-center">
                <h3 class="h2">Servicios
                    <span>prestados</span>
                </h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet. qui
                    suscipit atque <br>
                    fugiat officia corporis rerum eaque neque totam animi, sapiente culpa. Architecto!</p>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="items-container">
                        @foreach ($specialties as $specialty)
                            <div class="item">
                                <div class="inner-box">
                                    <div class="img_holder">
                                        <a href="{{ route('services.detail', $specialty->slug) }}">
                                            <img loading="lazy"
                                                src="{{ $specialty->image ? Storage::url($specialty->image) : asset('principal/images/gallery/1.jpg') }}"
                                                alt="images" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="image-content text-center">
                                        <a href="{{ route('services.detail', $specialty->slug) }}">
                                            <h6>{{ $specialty->name }}</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Service Section-->

    <!--team section-->
    <section class="team-section section"
        style="background-attachment: fixed; background-size: cover; background-image: url({{ asset('principal/images/services.jpg') }});">
        <div class="container">
            <div class="section-title text-center">
                <h3 class="h2">Nuestros médicos expertos
                </h3>
                <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem illo, rerum
                    <br>natus nobis deleniti doloremque minima odit voluptatibus ipsam animi?
                </p>
            </div>
            <div class="row justify-content-center mb-2">
                @foreach ($doctors as $doctor)
                    <div class="col-lg-3 col-md-4">
                        <div class="team-member">
                            <img loading="lazy"
                                src="{{ $doctor->picture ? Storage::url($doctor->picture) : asset('principal/images/team/doctor-lab-3.jpg') }}"
                                alt="doctor" class="img-fluid">
                            <div class="contents text-center">
                                <h4 style="font-size: 14px;">{{ $doctor->name }}</h4>
                                <a href="{{ route('services.doctor', $doctor->slug) }}" class="btn btn-main">Leer Más</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--End team section-->
@endsection
