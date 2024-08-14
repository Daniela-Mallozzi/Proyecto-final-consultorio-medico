<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('home') }}" aria-expanded="false">
                        <i class="fas fa-home"></i><span class="hide-menu">Inicio
                        </span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->is('miscitas*') ? 'selected' : '' }}"> <a
                        class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"><i
                            class="fas fa-calendar"></i><span class="hide-menu">Citas
                             </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item {{ request()->is('miscitas') ? 'active' : '' }}">
                            <a href="{{ route('miscitas.index') }}" class="sidebar-link">
                                <span class="hide-menu"> Mis citas
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ request()->is('miscitas/pendient') ? 'active' : '' }}">
                            <a href="{{ route('miscitas.pendient') }}" class="sidebar-link">
                                <span class="hide-menu"> Citas Pendientes
                                </span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ request()->is('miscitas/historial') ? 'active' : '' }}">
                            <a href="{{ route('miscitas.historial') }}" class="sidebar-link">
                                <span class="hide-menu">
                                    Historial
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>

                @include('includes.panel.menu.' . auth()->user()->role)

                <!-- <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="#"
                        onclick="event.preventDefault(); document.getElementById('formLogout').submit();"
                        aria-expanded="false">
                        <i class="fas fa-power-off"></i>
                        <span class="hide-menu">Cerrar Sesión</span></a>
                </li> -->

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
