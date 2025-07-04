<div class="sidebar" data-background-color="white">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="white">
            <center> <a href="index.html" class="logo">
                    <img src="{{ asset('assets/img/logo.jpg') }}" alt="navbar brand" class="navbar-brand" height="40" />
                </a></center>

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
                <li class="nav-item active">
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
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#forms">
                        <i class="fas fa-tags"></i>
                        <p>Article</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="forms">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('admin.addarticle') }}">
                                    <span class="sub-item">Ajoute article </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.listearticle') }}">
                                    <span class="sub-item">Liste article </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#tables">
                        <i class="fas fa-receipt"></i>
                        <p>Commande</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="tables">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="#">
                                    <span class="sub-item">Commande a valide</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sub-item">Commande valide</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item active">

                         <a data-bs-toggle="collapse" href="#stock">
                        <i class="fas fa-receipt"></i>
                        <p>Stock</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="stock">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('admin.stockarticle')}}">
                                    <span class="sub-item">Stock Entrant</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('stock.sortant')}}">
                                    <span class="sub-item">Stock Sortant</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </li>

                <li class="nav-item active">
                    <a href="{{route('liste.clients')}}">
                        <i class="fas fa-users"></i>
                        <p>Liste clients</p>
                    </a>
                </li>


                <li class="nav-item active">
                         <a data-bs-toggle="collapse" href="#payement">
                        <i class="fas fa-receipt"></i>
                        <p>Payement</p>
                        <span class="caret"></span>
                    </a>
                         <div class="collapse" id="payement">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('add.payement')}}">
                                    <span class="sub-item">Methode de payement</span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="sub-item">Historique</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </li>

            </ul>
        </div>
    </div>
</div>
