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
                        <form action="{{ route('panier.modifier.global') }}" method="POST">
                            @csrf
                            <table style="width:100%; border-collapse:separate; border-spacing:0 10px;">
                                <thead>
                                    <tr>
                                        <th style="padding:10px;">Article</th>
                                        <th style="padding:10px;">Type</th>
                                        <th style="padding:10px;">Taille</th>
                                        <th style="padding:10px;">Couleur</th>
                                        <th style="padding:10px;">Catégorie</th>
                                        <th style="padding:10px;">Prix unitaire</th>
                                        <th style="padding:10px;">Quantité</th>
                                        <th style="padding:10px;">Sous_Total</th>
                                        <th style="padding:10px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0; @endphp
                                    @if (session('panier') && count(session('panier')) > 0)
                                        @foreach (session('panier') as $id => $item)
                                            @php
                                                $sous_total = $item['prix'] * $item['quantite'];
                                                $total += $sous_total;
                                            @endphp
                                            <tr>
                                                <td style="padding:10px;" class="cart__product__item">
                                                    @if (isset($item['photo']) && $item['photo'])
                                                        <img src="{{ asset('assets/upload/' . $item['photo']) }}"
                                                            alt="{{ $item['nom'] }}" style="width: 100px">
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
                                                <td style="padding:10px;">{{ $item['type'] ?? '' }}</td>
                                                <td style="padding:10px;">{{ $item['taille'] ?? '' }}</td>
                                                <td style="padding:10px;">{{ $item['couleur'] ?? '' }}</td>
                                                <td style="padding:10px;">{{ $item['categorie'] ?? '' }}</td>
                                                <td style="padding:10px;" class="cart__price">
                                                    {{ number_format($item['prix'], 0, ',', ' ') }} MGA</td>
                                                <td style="padding:10px;" class="cart__quantity">
                                                    <div class="pro-qty">
                                                        <input type="number" name="quantites[{{ $id }}]"
                                                            value="{{ $item['quantite'] }}" min="1">
                                                    </div>
                                                </td>
                                                <td style="padding:10px;" class="cart__total">
                                                    {{ number_format($sous_total, 0, ',', ' ') }} MGA</td>
                                                <td style="padding:10px;" class="cart__close">
                                                    <a href="{{ route('panier.supprimer.lien', $id) }}"><span><i
                                                                class="fa fa-trash"></i></span></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="9" class="text-center">Panier vide</td>
                                        </tr>
                                    @endif
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
                        <button type="submit" class="btn btn-warning">
                            <i class="fa fa-refresh"></i> Modifier le panier
                        </button>
                    </div>
                </div>
            </div>
            </form>

            <div class="row">
                @if (session('panier') && count(session('panier')) > 0)
                    <form action="{{ route('commande.enregistrer') }}" method="POST">
                        @csrf
                        <div class="col-lg-4 offset-lg-2" style="margin-left: 400px">
                            <div class="cart__total__procced">
                                <h6>Total du panier</h6>
                                <ul>
                                    <li>Total <span>{{ number_format($total, 0, ',', ' ') }}MGA</span></li>
                                </ul>
                                <h6 style="margin-top: 20px">Date livraison</h6>
                               <input type="date" class="form-control" name="date_livraison" id="dateLivraison" required>


                                <button type="submit" class="primary-btn"
                                    style="width:100%; margin-top:15px">Commander</button>

                @endif
            </div>
        </div>
        </form>
        </div>
        <div class="col-lg-12">
            <div class="product__details__tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Méthode de
                            paiement</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            @foreach ($methode as $m)
                                <div class="col">
                                    <div class="card">
                                        <center> <img src="{{ asset('assets/upload/' . $m->TypePaiement->photo) }}"
                                                class="card-img-top" alt="..." style="width: 200px"></center>
                                        <div class="card-body">
                                            <h5 class="card-title">Nom du compte : {{ $m->nom }} </h5>
                                            <p class="card-text">Numero telephone : {{ $m->telephone }} </p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    @include('partials.clients.footer')
    <!-- Shop Cart Section End -->

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const inputDate = document.getElementById('dateLivraison');
        const today = new Date();
        today.setDate(today.getDate() + 3); // ajoute 3 jours

        const yyyy = today.getFullYear();
        const mm = String(today.getMonth() + 1).padStart(2, '0');
        const dd = String(today.getDate()).padStart(2, '0');

        inputDate.min = `${yyyy}-${mm}-${dd}`;
    });
</script>

@endsection
