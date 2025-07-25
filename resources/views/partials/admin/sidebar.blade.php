<div class="sidebar" data-background-color="white">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header " data-background-color="white">
            <a href="index.html" class="logo">
                <img src="{{ asset('assets/img/Wanny Style_Logo_CMYK_Coloured wo-BG.png') }}" alt="navbar brand"
                    class="navbar-brand" height="110" />
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
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item {{ request()->routeIs('admin.accueil') ? 'active' : '' }}">
                    <a href="{{ route('admin.accueil') }}">
                        <i class="far fa-chart-bar"></i>
                        <p>Tableau de bord</p>
                    </a>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>

                </li>
                <li class="nav-item {{ request()->routeIs('admin.addarticle', 'admin.listearticle') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#forms"
                        aria-expanded="{{ request()->routeIs('admin.addarticle', 'admin.listearticle') ? 'true' : 'false' }}">
                        <i class="fas fa-tags"></i>
                        <p>Article</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->routeIs('admin.addarticle', 'admin.listearticle') ? 'show' : '' }}"
                        id="forms">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->routeIs('admin.addarticle') ? 'active' : '' }}">
                                <a href="{{ route('admin.addarticle') }}">
                                    <span class="sub-item">Ajout article </span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('admin.listearticle') ? 'active' : '' }}">
                                <a href="{{ route('admin.listearticle') }}">
                                    <span class="sub-item">Liste article </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item  {{ request()->routeIs('admin.commande', 'commande.validation') ? 'active' : '' }}  ">
                    <a data-bs-toggle="collapse" href="#tables" aria-expanded="{{ request()->routeIs('admin.commande', 'commande.validation') ? 'true' : 'false' }}">
                        <i class="fas fa-receipt"></i>
                        <p>Commande</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->routeIs('admin.commande', 'commande.validation') ? 'show' : '' }}" id="tables">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->routeIs('admin.commande') ? 'active' : '' }}">
                                <a href="{{ route('admin.commande') }}">
                                    <span class="sub-item">Commande a valide</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('commande.validation') ? 'active' : '' }}">
                                <a href="{{ route('commande.validation') }}">
                                    <span class="sub-item">Commande valide</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.stockarticle', 'stock.sortant') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#stock"
                        aria-expanded="{{ request()->routeIs('admin.stockarticle', 'stock.sortant') ? 'true' : 'false' }}">
                        <i class="fa-solid fa-boxes-stacked"></i>
                        <p>Stock</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->routeIs('admin.stockarticle', 'stock.sortant') ? 'show' : '' }}"
                        id="stock">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->routeIs('admin.stockarticle') ? 'active' : '' }}">
                                <a href="{{ route('admin.stockarticle') }}">
                                    <span class="sub-item">Stock Entrant</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('stock.sortant') ? 'active' : '' }}">
                                <a href="{{ route('stock.sortant') }}">
                                    <span class="sub-item">Stock Sortant</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item {{ request()->routeIs('liste.clients') ? 'active' : '' }}">
                    <a href="{{ route('liste.clients') }}">
                        <i class="fas fa-users"></i>
                        <p>Listes clients</p>
                    </a>
                </li>
              @if (Auth::check() && Auth::user()->role === '0')

                    <li class="nav-item {{ request()->routeIs('admin.gutilisateur') ? 'active' : '' }}">
                        <a href="{{ route('admin.gutilisateur') }}">
                            <i class="fa-solid fa-users-gear"></i>
                            <p>Gestion utilisateurs</p>
                        </a>
                    </li>
                @endif



                <li class="nav-item {{ request()->routeIs('add.payement','historique.paiement') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#payement"
                        aria-expanded="{{ request()->routeIs('add.payement') ? 'true' : 'false' }}">
                        <i class="fa-solid fa-credit-card"></i>
                        <p>Paiement</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->routeIs('historique.paiement','add.payement') ? 'show' : '' }}" id="payement">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->routeIs('historique.paiement') ? 'active' : '' }}">
                                <a href="{{route('historique.paiement')}}">
                                    <span class="sub-item">Historique</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('add.payement') ? 'active' : '' }}">
                                <a href="{{ route('add.payement') }}">
                                    <span class="sub-item">Methode de paiement</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
