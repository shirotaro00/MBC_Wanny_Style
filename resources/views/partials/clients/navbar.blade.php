@include('partials.clients.modal.inscription')
@include('partials.clients.modal.connexion')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous"><!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__close">+</div>
    <ul class="offcanvas__widget">
        <li><span class="icon_search search-switch"></span></li>

        </a></li>
        <li><a href="#"><span class="icon_bag_alt"></span>
                <div class="tip">4</div>
            </a></li>
    </ul>
    <div class="offcanvas__logo" style="text-align: center; padding: 20px 0;">
        <a href="{{ route('page.accueil') }}">
            <img src="{{ asset('assets/img/logo.jpg') }}" alt="Logo" style="max-width: 120px; height: auto; display: inline-block;">
        </a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__auth custom-auth-links">
        <a href="#"><i class="fa fa-sign-in-alt"></i> Connexion</a>
        <a href="#"><i class="fa fa-user-plus"></i> Inscription</a>
    </div>

</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-2">
                <div class="header__logo">
                    <a href="./index.html"><img class="photo" src=" {{ asset('assets/img/logo.jpg') }}"
                            alt=""></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{ route('page.accueil') }}">Accueil</a></li>
                        <li><a href="{{ route('page.article') }}">Article</a></li>
                         @if (Auth::check() && Auth::user()->role === '1')
                        <li><a href="{{ route('client.historique') }}">Historique d'achats</a></li>
                        @endif
                        <li><a href="./contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3" >
                <div class="header__right d-flex align-items-center justify-content-end" style="gap: 18px;">

                    <div class="header__right__auth d-flex align-items-center" style="gap: 10px; margin-bottom:20px;">

                      <a href="#" data-bs-toggle="modal" data-bs-target="#forminscription">
                            Inscription
                        </a>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#formModal">
                            Connexion
                        </a>

                    </div>

                    <ul class="header__right__widget d-flex align-items-center mb-0" style="gap: 30px; list-style: none;">
                        <li class="d-flex align-items-center dropdown" style="gap: 6px;">
                             @if (Auth::check() && Auth::user()->role === '1')
                            <a href="#" class="d-flex align-items-center dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="cursor:pointer;">
                                <i class="fa-solid fa-user-circle"></i>
                                <span style="margin-left: 10px;">{{ Auth::user()->prenom }}</span>
                            </a>
                            @endif
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('client.profil') }}">
                                        <i class="fa fa-user-circle"></i> Profil
                                    </a>
                                </li>

                                <li>
                                    <form action="" method="POST" style="margin:0;">
                                        @csrf
                                        <a href="{{ route('client.logout') }}" class="dropdown-item">
                                            <i class="fa fa-sign-out-alt"></i> Déconnexion
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('client.panier') }}">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
<!-- Header Section End -->




