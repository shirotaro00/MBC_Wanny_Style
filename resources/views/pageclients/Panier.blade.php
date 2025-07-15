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
                        <a href="{{ route('page.accueil')}}"><i class="fa fa-home"></i> Accueil</a>
                        <span>Votre panier</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Article</th>
                                    <th>Prix unitaire</th>
                                    <th>Quantité</th>
                                    <th>Sous_Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                 @php $total = 0; @endphp

                        @if(session('panier') && count(session('panier')) > 0)
                            @foreach(session('panier') as $id => $item)
                                @php
                                    $sous_total = $item['prix'] * $item['quantite'];
                                    $total += $sous_total;
                                @endphp
                                <tr>
                                    <td class="cart__product__item">
                                        @if(isset($item['photo']) && $item['photo'])
                                            <img src="{{ asset('assets/upload/' . $item['photo']) }}" alt="{{ $item['nom'] }}" style="width: 100px">
                                        @endif
                                        <div class="cart__product__item__title">
                                            <h6>{{ $item['nom'] }}</h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">{{ number_format($item['prix'], 0, ',', ' ') }} Ar</td>
                                    <td class="cart__quantity">
                                        <div class="pro-qty">
                                            <input type="text"  value="{{ $item['quantite'] }}">
                                        </div>
                                    </td>
                                    <td class="cart__total">{{ number_format($sous_total, 0, ',', ' ') }} MGA</td>
                                     <td class="cart__close">
                                        <a href="{{ route('panier.supprimer.lien', $id) }}"><span ><i class="fa fa-trash" ></i></span></a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="{{ route('page.article') }}">Continue l'achat</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <a href="#"><span ></span> Modifier le panier</a>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Total du panier</h6>
                        <ul>
                            <li>Total <span>{{ number_format($total, 0, ',', ' ') }}MGA</span></li>
                        </ul>
                        @else
                            <ul>
                                <li>Panier vide</li>
                            </ul>
                        @endif
                        <a href="#" class="primary-btn">Procéder au commande</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->
@endsection




