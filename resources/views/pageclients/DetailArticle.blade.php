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
    <form action="{{ route('panier.ajouter',$articles->id) }}" method="post">
        @csrf
        <input type="hidden" name="article_id" value="{{ $articles->id }}">
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
                            <div class="row">
                                <!-- Colonne gauche -->
                                <div class="col-md-6">
                                    <h3>{{ $articles->nom }}
                                        <br>

                                        <span>Categorie : {{ $articles->categorie }}</span>
                                        <span>Type : {{ $articles->typeArticle->type }}</span>
                                    </h3>

                                    <div class="rating mt-2">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>

                                <!-- Colonne droite -->
                                <div class="col-md-6">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                            <h3>Description</h3>
                                            <p>{{ $articles->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product__details__price">{{ number_format($articles->prix, 0, ',', ' ') }} MGA</div>

                            <div class="product__details__widget">
                                <ul>

                                    <li>
                                        <span>Stock disponible :</span>
                                        <div class="stock">

                                            @if ($articles->quantite > 0)
                                                <span class="text-success">{{ $articles->quantite }} en stock</span>
                                            @else
                                                <span class="text-danger">Rupture de stock</span>
                                            @endif
                                        </div>
                                    </li>

                                    <li>
                                        <span>Couleur disponible :</span>
                                        <div class="stock__checkbox">
                                            <label for="stockin">
                                                {{ $articles->detailArticle->couleur }}
                                                <input type="checkbox" id="stockin">
                                                <span class="checkmark"></span>
                                            </label>
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
                            <div class="product__details__button" style="margin-top: 50px">
                                <div class="quantity">
                                    <span>Quantite:</span>
                                    <div class="pro-qty">
                                        <input type="number" name="quantite" value="1" min="1">
                                    </div>
                                </div>
                                <button type="submit" class="cart-btn"><span><i class="fas fa-cart-plus"></i></span>Ajout
                                    au panier</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
    <!-- Product Details Section End -->


    <!-- Footer Section Begin -->
@endsection
@section('script')
@endsection
