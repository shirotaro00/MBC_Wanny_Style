<div class="main-header">
    <div class="main-header-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="white">
            <a href="{{ route('admin.dashboard') }}">

                <img src="{{ asset('assets/img/logo.jpg') }}" alt="Logo"
                    style="max-width: 120px; height: auto; display: inline-block;">

            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
        <div class="container-fluid">
            <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">

            </nav>

            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">

                    <ul class="dropdown-menu dropdown-search animated fadeIn">
                        <form class="navbar-left navbar-form nav-search">
                            <div class="input-group">
                                <input type="text" placeholder="Recherche ..." class="form-control" />
                            </div>
                        </form>
                    </ul>
                </li>


                <li class="nav-item topbar-user dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                        aria-expanded="false">
                        <img src="{{ asset('assets/img/WS-07.png') }}" alt="" srcset="" width="200px"
                            style="color: white; margin-right: 800px">
                        <div class="avatar-sm" style="margin-left: -20px">
                            <i class="fas fa-user" style="font-size:30px;color:white;"></i>

                        </div>

                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg">
                                        <i class="fas fa-user" style="font-size:30px "></i>
                                    </div>
                                    <div class="u-text">
                                        <p class="text-muted">Bienvenue</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('admin.profil') }}">Mon Profil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('deconnexion') }}">Deconnexion</a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>
