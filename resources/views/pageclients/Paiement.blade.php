@extends('partials/clients.App');
@section('style')
@endsection
@section('body')
    @include('partials/clients.navbar')

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">

            <form action="{{ route('paiement.store') }}" class="checkout__form" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <h5>Paiement</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Nom : {{ Auth::user()->nom }} </p>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Prenom : {{ Auth::user()->prenom }} </p>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Telephone : {{ Auth::user()->telephone }} </p>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Adresse : {{ Auth::user()->adresse }} </p>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Email : {{ Auth::user()->email }} </p>

                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout__order">
                            <h5>Vos commandes</h5>
                            @php $total = 0; @endphp
                            @foreach ($commandes as $commande)
                                <div class="checkout__order__product">
                                    <ul>
                                        <li>
                                            <span class="top__text">Référence commande</span>
                                            <span class="top__text__right">Prix</span>
                                        </li>
                                        @foreach ($commande->detailCommande as $detail)
                                            <li>
                                                {{ $commande->reference_commande ?? '' }}
                                                 <span>{{ number_format($detail->article->prix, 0, ',', ' ') }} MGA</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                            <div class="checkout__order__total">
                                <ul>
                                    <li>Total  <span>{{ number_format($detail->prix_unitaire * $detail->quantite, 0, ',', ' ') }} MGA</span></li>
                                </ul>
                            <label for="">Montant
                                    <input type="text"  class="form-control" id="" name="montant">
                                </label>
                                <br>
                                <label for="">Reference paiement
                                    <input type="text" class="form-control" id="" name="Ref_paiement">
                                </label>
                                <br>
                                <label for="">
                                    <select name="methode_paiement_id" class="form-select" id="">
                                        <option value="">Choisir une méthode de paiement</option>
                                        @foreach ($methode as $item)
                                            <option value="{{ $item->id }}">{{ $item->TypePaiement->type }}</option>
                                        @endforeach
                                    </select>
                                </label>

                            </div>

                            <button type="submit" class="site-btn">payé</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Checkout Section End -->

    <!-- Instagram Begin -->
    <div class="instagram">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-1.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-2.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-3.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-4.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-5.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="img/instagram/insta-6.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ ashion_shop</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Instagram End -->
    @include('partials/clients.footer')
@endsection

@section('script')
@endsection
