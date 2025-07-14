@extends('partials/clients.App');
@section('style')
@endsection
@section('body')
    @include('partials/clients.navbar')
    @include('partials.clients.modal.inscription')
    @include('partials.clients.modal.connexion')

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('page.accueil') }}"><i class="fa fa-home"></i> Accueil</a>
                        <span>{{ $articles->nom }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll">
                            <a class="pt active" href="#product-1">
                                <img src="{{ asset('assets/upload/' . $articles->photo) }}" alt="">
                            </a>
                        </div>
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                <img data-hash="product-1" class="product__big__img"
                                    src="{{ asset('assets/upload/' . $articles->photo) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3>{{ $articles->nom }} <span>Categorie : {{ $articles->categorie }} </span>
                            <span>Type:{{ $articles->typeArticle->type }}</span>
                        </h3>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__details__price">{{ number_format($articles->prix, 0, ',', ' ') }} MGA</div>
                        <div class="product__details__button">
                            <div class="quantity">
                                <span>Quantite:</span>
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                            <a href="#" class="cart-btn"><span><i class="fas fa-cart-plus"></i></span> Ajout au
                                panier</a>
                        </div>
                        <div class="product__details__widget">
                            <ul>
                                <li>
                                    <span>Stock disponible: {{ $articles->quantite }}</span>
                                </li> <br>

                                <li>
                                    <span>Couleur disponible :</span>
                                    <div class="color__checkbox">
                                        @foreach ($couleursDispo as $nomCouleur)
                                            @php
                                                $isWhite = in_array($nomCouleur, ['white', 'blanc', '#fff', '#ffffff']);
                                            @endphp
                                            <label title="{{ ucfirst($nomCouleur) }}">
                                                <input type="radio" name="color__radio" value="{{ $nomCouleur }}">
                                                <span class="checkmark"
                                                    style="
                        background-color: {{ $nomCouleur }};
                        border: 1px solid {{ $isWhite ? '#000' : '#ccc' }};
                        width: 20px;
                        height: 20px;
                        display: inline-block;
                        border-radius: 50%;
                        cursor: pointer;
                    ">
                                                </span>
                                            </label>
                                        @endforeach
                                    </div>
                                </li>

                                @php
                                    $tailles = explode(',', $articles->taille);
                                @endphp
                                <li>
                                    <span>Taille disponible :</span>
                                    <div class="size__btn">
                                        @foreach ($tailles as $taille)
                                            <label>
                                                <input type="radio" name="taille_radio">
                                                {{ strtoupper(trim($taille)) }}
                                            </label>
                                        @endforeach
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <h6>Description</h6>
                                <p>{{ $articles->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->


    <!-- Footer Section Begin -->
@endsection
@section('script')
@endsection
