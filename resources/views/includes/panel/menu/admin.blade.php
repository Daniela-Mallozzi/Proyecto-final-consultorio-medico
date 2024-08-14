

<li class="sidebar-item {{ request()->is('users') || request()->is('profile') ? 'selected' : '' }}">
    <a class="sidebar-link" href="{{ route('users.index') }}" aria-expanded="false">
        <i class="fas fa-users"></i><span class="hide-menu">Usuarios
        </span>
    </a>
</li>
<li class="sidebar-item {{ request()->is('medicos*') ? 'selected' : '' }}">
    <a class="sidebar-link sidebar-link" href="{{ route('medicos.index') }}" aria-expanded="false">
        <i class="fas fa-user-md"></i>
        <span class="hide-menu">Médicos</span>
    </a>
</li>
<li class="sidebar-item {{ request()->is('pacientes*') ? 'selected' : '' }}">
    <a class="sidebar-link sidebar-link" href="{{ route('pacientes.index') }}" aria-expanded="false">
        <i class="fas fa-procedures"></i>
        <span class="hide-menu">Pacientes</span>
    </a>
</li>

<li class="sidebar-item {{ request()->is('specialties*') ? 'selected' : '' }}">
    <a class="sidebar-link sidebar-link" href="{{ route('specialties.index') }}" aria-expanded="false">
        <i class="fas fa-hospital"></i>
        <span class="hide-menu">Especialidades</span>
    </a>
</li>

<li class="sidebar-item {{ request()->is('contact') ? 'selected' : '' }}">
    <a class="sidebar-link" href="{{ route('contact.show') }}" aria-expanded="false">
        <i class="fas fa-book"></i><span class="hide-menu">Contáctanos
        </span>
    </a>
</li>

<!-- <li class="sidebar-item {{ request()->is('sliders*') ? 'selected' : '' }}">
    <a class="sidebar-link" href="{{ route('sliders.index') }}" aria-expanded="false">
        <i class="fas fa-images"></i><span class="hide-menu">Sliders
        </span>
    </a>
</li> -->