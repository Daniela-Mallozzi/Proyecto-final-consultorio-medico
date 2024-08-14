@extends('layouts.app')

@section('content')
    <!--Page Title-->
    <section class="page-title text-center" style="background-image:url({{asset('principal/images/background/3.jpg')}});">
        <div class="container">
            <div class="title-text">
                <h1>Contacto</h1>
                <ul class="title-menu clearfix">
                    <li>
                        <a href="{{route('welcome')}}">inicio &nbsp;/</a>
                    </li>
                    <li>Contacto</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <section class="section contact">
        <!-- container start -->
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 ">
                    <!-- address start -->
                    <div class="address-block">
                        <!-- Location -->
                        <div class="media">
                            <i class="far fa-map"></i>
                            <div class="media-body">
                                <h3>Ubicación</h3>
                                <p>{{$contact->address}}</p>
                            </div>
                        </div>
                        <!-- Phone -->
                        <div class="media">
                            <i class="fas fa-phone"></i>
                            <div class="media-body">
                                <h3>Teléfono</h3>
                                <p>
                                    {{$contact->phone}}
                                </p>
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="media">
                            <i class="far fa-envelope"></i>
                            <div class="media-body">
                                <h3>Correo electrónico</h3>
                                <p>
                                    {{$contact->email}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- address end -->
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="contact-form">
                        <!-- contact form start -->
                        <form action="{{ route('contact.send') }}" method="POST" class="row">
                            @csrf
                            <!-- name -->
                            <div class="col-lg-6">
                                <input type="text" name="name" class="form-control main" placeholder="Nombre">
                            </div>
                            <!-- email -->
                            <div class="col-lg-6">
                                <input type="email" name="email" class="form-control main" placeholder="Correo electrónico">
                            </div>
                            <!-- phone -->
                            <div class="col-lg-12">
                                <input type="text" name="phone" class="form-control main" placeholder="Teléfono">
                            </div>
                            <!-- message -->
                            <div class="col-lg-12">
                                <textarea name="message" rows="10" class="form-control main" placeholder="Tu mensaje"></textarea>
                            </div>
                            <!-- submit button -->
                            <div class="col-md-12 text-right">
                                <button class="btn btn-style-one" type="submit">Enviar mensaje</button>
                            </div>
                        </form>
                        
                        <!-- contact form end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- container end -->
    </section>
    <!--====  End of Contact Form  ====-->
@endsection
