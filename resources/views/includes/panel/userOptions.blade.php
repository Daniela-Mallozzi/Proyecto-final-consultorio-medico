<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        <img src="{{ auth()->user()->picture ? Storage::url(auth()->user()->picture) : asset('assets/images/users/profile-pic.jpg') }}" alt="user" class="rounded-circle" width="40">
        <span class="ms-2 d-none d-lg-inline-block"><span>Hola,</span> <span
                class="text-dark">{{ auth()->user()->name }}</span> <i data-feather="chevron-down"
                class="svg-icon"></i></span>
    </a>
    <div class="dropdown-menu dropdown-menu-end dropdown-menu-right user-dd animated flipInY">
        <a class="dropdown-item" href="{{route('profile.index')}}">
            <i class="fas fa-user mx-2"></i>
            Mi Perfil</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="javascript:void(0)"
            onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
            <i class="fas fa-power-off mx-2"></i>
            Cerrar Sesión</a>
        <form action="{{ route('logout') }}" method="POST" style="display: none;" id="formLogout">
            @csrf
        </form>
    </div>
</li>




{{-- <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
    <div class=" dropdown-header noti-title">
        <h6 class="text-overflow m-0">Bienvenidos</h6>
    </div>
    <a href="#" class="dropdown-item">
        <i class="ni ni-single-02"></i>
        <span>Mi perfil</span>
    </a>
    <a href="#" class="dropdown-item">
        <i class="ni ni-settings-gear-65"></i>
        <span>Configuración</span>
    </a>
    <a href="#" class="dropdown-item">
        <i class="ni ni-calendar-grid-58"></i>
        <span>Mis citas</span>
    </a>
    <a href="#" class="dropdown-item">
        <i class="ni ni-support-16"></i>
        <span>Ayuda</span>
    </a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
        <i class="ni ni-user-run"></i>
        <span>Cerrar sesión</span>
        <form action="{{ route('logout') }}" method="POST" style="display: none;" id="formLogout">
             @csrf
         </form>
    </a>
</div> --}}
