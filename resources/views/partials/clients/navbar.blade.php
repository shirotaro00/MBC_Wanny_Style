@include('partials.clients.modal.inscription')
   @include("partials.clients.modal.connexion")
   <!-- Page Preloder -->
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
        <div class="offcanvas__logo">
            <a href="{{ route('page.accueil') }}"><img src="img/logo.png" alt=""></a>
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
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <div class="header__right__auth">
                               <a href="#" data-bs-toggle="modal"
                                data-bs-target="#forminscription">
                                Inscription
                            </a>
                            <a href="{{ route('client.connecte') }}"  data-bs-toggle="modal"
                                data-bs-target="#formModal">
                                connexion
                            </a>
                        </div>
                        <ul class="header__right__widget">

                            <li><a href="#"><i class="fa-solid fa-cart-shopping"></i>
                                    <div class="tip">2</div>
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
    <!-- Header Section End -->
