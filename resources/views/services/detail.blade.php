@extends('layouts.app')

@section('styles')
    <style>
        iframe {
            width: 100%;
        }
    </style>
@endsection

@section('content')
    <!--Page Title-->
    <section class="page-title text-center" style="background-image:url({{ asset('principal/images/background/3.jpg') }});">
        <div class="container">
            <div class="title-text">
                <h1>{{ $service->name }}</h1>
                <ul class="title-menu clearfix">
                    <li>
                        <a href="{{ route('welcome') }}">Inicio &nbsp;/</a>
                    </li>
                    <li>{{ $service->name }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <section class="service-overview section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="content-block">
                        <h2>{{ $service->name }}</h2>
                    </div>

                    <img class="img-thumbnail mb-4"
                        src="{{ $service->image ? Storage::url($service->image) : asset('principal/images/gallery/1.jpg') }}"
                        alt="">

                        <div class="content-block">
                            <h4>Nuestras Especialistas</h4>
                        </div>

                    <ul class="list-group text-center">

                        @foreach ($service->users as $doctor)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <b>{{ $doctor->name }}</b>

                                <img class="img-thumbnail" src="{{ $doctor->picture ? Storage::url($doctor->picture) : asset('principal/images/gallery/1.jpg') }}" alt="" width="200px">

                            </li>
                            
                        @endforeach

                    </ul>
                </div>

                <div class="col-lg-6">
                    <div class="content-block">
                        {!! $service->description !!}
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
