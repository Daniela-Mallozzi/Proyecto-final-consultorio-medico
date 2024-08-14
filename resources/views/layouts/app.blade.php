<!DOCTYPE html>
<html lang="es">

<head>

    <!-- ** Basic Page Needs ** -->
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>

    <!-- ** Mobile Specific Metas ** -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Medical HTML Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="medical">
    <meta name="generator" content="Themefisher Medical HTML Template v1.0">

    <!-- theme meta -->
    <meta name="theme-name" content="medic" />

    <!-- ** Plugins Needed for the Project ** -->
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('principal/plugins/bootstrap/bootstrap.min.css') }}">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="{{ asset('principal/plugins/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('principal/plugins/slick/slick-theme.css') }}">
    <!-- FancyBox -->
    <link rel="stylesheet" href="{{ asset('principal/plugins/fancybox/jquery.fancybox.min.css') }}">
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('principal/plugins/fontawesome/css/all.min.css') }}">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{ asset('principal/plugins/animation/animate.min.css') }}">
    <!-- jquery-ui -->
    <link rel="stylesheet" href="{{ asset('principal/plugins/jquery-ui/jquery-ui.css') }}">
    <!-- timePicker -->
    <link rel="stylesheet" href="{{ asset('principal/plugins/timePicker/timePicker.css') }}">

    <!-- Stylesheets -->
    <link href="{{ asset('principal/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('principal/css/menu.css') }}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

    @yield('styles')

    <!--Favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

</head>


<body>

    <div class="logo logo_main">{{ config('app.name') }}</div>

    <div class="nav">
        <div class="wrap">
            <div class="logo logo_small">{{ config('app.name') }}</div>
            <nav>
                <ul>
                    <li><a class="{{ request()->is('/') ? 'active' : '' }}" href="{{ route('welcome') }}">Inicio</a>
                    </li>
                    <li>
                        <a class="{{ request()->is('services*') ? 'active' : '' }}" href="{{ route('services.index') }}">Servicios</a>
                    </li>
                    <li>
                        <a class="{{ request()->is('contact') ? 'active' : '' }}" href="{{ route('contact.index') }}">Contactos</a
                            ></li>
                    <li>
                        <a href="{{ route('login') }}">Iniciar</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <i class="fas fa-ellipsis-v btn-menu"></i>

    <div class="page-wrapper">

        <div class="container-bar">
            <input type="checkbox" id="btn-social">
            <label for="btn-social" class="fa fa-play"></label>
            <div class="icon-social">
                <a href="{{ $contact->facebook }}" target="_blank" class="fab fa-facebook">
                    <span id="title">Facebook</span>
                </a>
                <a href="{{ $contact->youtube }}" target="_blank" class="fab fa-youtube">
                    <span id="title">Youtube</span>
                </a>
                <a href="{{ $contact->twitter }}" target="_blank" class="fab fa-twitter">
                    <span id="title">Twitter</span>
                </a>
                <a href="{{ $contact->github }}" target="_blank" class="fab fa-github">
                    <span id="title">Github</span>
                </a>
                <a href="{{ $contact->pinterest }}" target="_blank" class="fab fa-pinterest">
                    <span id="title">Pinterest</span>
                </a>
            </div>
        </div>


        @yield('content')

        <!--footer-main-->
        <footer class="footer-main">
            <div class="footer-top">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            <div class="about-widget">
                                <div class="footer-logo">
                                    <figure>
                                        <a href="{{ route('welcome') }}">
                                            <img loading="lazy" width="60" class="img-fluid"
                                                src="{{ asset('assets/images/logo.png') }}" alt="medic">
                                        </a>
                                    </figure>
                                </div>
                                <p>{{ $contact->message }}</p>
                                <ul class="location-link">
                                    <li class="item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p>{{ $contact->address }}</p>
                                    </li>
                                    <li class="item">
                                        <i class="far fa-envelope" aria-hidden="true"></i>
                                        <a href="mailto:{{ $contact->email }}">
                                            <p>{{ $contact->email }}</p>
                                        </a>
                                    </li>
                                    <li class="item">
                                        <i class="fas fa-phone" aria-hidden="true"></i>
                                        <p>{{ $contact->phone }}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-5 mb-3 mb-md-0">
                            <h2>Servicios</h2>
                            <ul class="menu-link">
                                @foreach ($especialiades as $specialty)
                                    <li>
                                        <a href="{{ route('services.detail', $specialty->slug) }}">
                                            <i class="fa fa-angle-right"
                                                aria-hidden="true"></i>{{ $specialty->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container clearfix">
                    <div class="">
                        <p>&copy; DM {{ date('Y') }}.
                            <a href="#">♥</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!--End footer-main-->

        <!-- scroll-to-top -->
        <div id="back-to-top" class="back-to-top">
            <i class="fa fa-angle-up"></i>
        </div>


    </div>
    <!--End pagewrapper-->


    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target=".header-top">
        <span class="icon fa fa-angle-up"></span>
    </div>


    <!-- jquery -->
    <script src="{{ asset('principal/plugins/jquery.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('principal/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('principal/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('principal/plugins/slick/slick-animation.min.js') }}"></script>
    <!-- FancyBox -->
    <script src="{{ asset('principal/plugins/fancybox/jquery.fancybox.min.js') }}" defer></script>

    <!-- jquery-ui -->
    <script src="{{ asset('principal/plugins/jquery-ui/jquery-ui.js') }}" defer></script>
    <!-- timePicker -->
    <script src="{{ asset('principal/plugins/timePicker/timePicker.js') }}" defer></script>

    <!-- script js -->
    <script src="{{ asset('principal/js/script.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        var elementTop = $('.nav').offset().top;

        $(window).scroll(function() {
            if ($(window).scrollTop() >= elementTop) {
                $('body').addClass('nav_fixed');
            } else {
                $('body').removeClass('nav_fixed');
            }
        });

        $('.btn-menu').on('click', function() {
            $('.nav').toggleClass('nav-toggle');
        })

        toastr.options.progressBar = true;

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.warning("{{ $error }}")
            @endforeach
        @endif
    </script>

    @yield('scripts')
</body>

</html>
