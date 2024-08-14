@extends('layouts.app')

@section('content')
    <!--Page Title-->
    <section class="page-title text-center" style="background-image:url({{asset('principal/images/background/3.jpg')}});">
        <div class="container">
            <div class="title-text">
                <h1>servicio</h1>
                <ul class="title-menu clearfix">
                    <li>
                        <a href="{{route('welcome')}}">Inicio &nbsp;/</a>
                    </li>
                    <li>servicio</li>
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
                        <h2>Nuestros Servicios Médicos</h2>
                        <p>En nuestra clínica, ofrecemos una amplia gama de servicios médicos diseñados para atender todas tus necesidades de salud. Contamos con un equipo de profesionales altamente capacitados y la tecnología más avanzada para garantizar la mejor atención posible.</p>
                        <ul>
                            <li><i class="fas fa-caret-right"></i> Consultas médicas generales y especializadas</li>
                            <li><i class="fas fa-caret-right"></i> Diagnóstico y tratamiento personalizado</li>
                            <li><i class="fas fa-caret-right"></i> Servicios de laboratorio y radiología</li>
                            <li><i class="fas fa-caret-right"></i> Programas de prevención y bienestar</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="accordion-section">
                        <div class="accordion-holder">
                            <div class="accordion" id="accordionGroup" role="tablist" aria-multiselectable="true">
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingOne">
                                        <h4 class="card-title">
                                            <a role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                ¿Por qué elegir nuestra clínica?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordionGroup">
                                        <div class="card-body">
                                            Nuestra clínica se distingue por su compromiso con la excelencia médica y el cuidado centrado en el paciente. Ofrecemos un ambiente cálido y profesional donde tu salud es nuestra prioridad.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingTwo">
                                        <h4 class="card-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                ¿Cuáles son los horarios de visita?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordionGroup">
                                        <div class="card-body">
                                            Nuestros horarios de visita están diseñados para ser flexibles y convenientes, permitiendo que tus seres queridos te acompañen durante tu recuperación. Consulta nuestros horarios específicos en la recepción.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingThree">
                                        <h4 class="card-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                ¿Cuántos visitantes están permitidos?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordionGroup">
                                        <div class="card-body">
                                            Permitimos un número limitado de visitantes por paciente para asegurar un ambiente tranquilo y seguro. Por favor, consulta nuestras políticas de visita para más detalles.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="service-section bg-gray section">
        <div class="container">
            <div class="section-title text-center">
                <h3>Nuestros
                    <span>Servicios</span>
                </h3>
                <p>Descubre la variedad de servicios que ofrecemos para cuidar de tu salud. Desde consultas generales hasta especialidades avanzadas, estamos aquí para ayudarte a vivir una vida saludable.</p>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="items-container">
                        @foreach ($especialiades as $speciality)                           
                        <div class="item">
                            <div class="inner-box">
                                <div class="img_holder">
                                    <a href="{{route('services.detail', $speciality->slug)}}">
                                        <img loading="lazy" src="{{ $speciality->image ? Storage::url($speciality->image ) : asset('principal/images/gallery/1.jpg') }}" alt="images" class="img-fluid">
                                    </a>
                                </div>
                                <div class="image-content text-center">
                                    <a href="{{route('services.detail', $speciality->slug)}}">
                                        <h6>{{$speciality->name}}</h6>
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
@endsection
