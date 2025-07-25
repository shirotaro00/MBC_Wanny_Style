@extends('partials/clients.App');
@section('style')
@endsection
@section('body')
    @include('partials/clients.navbar')
    <section class="checkout spad">
        <div class="container">

            <form action="#" class="checkout__form">
                <div class="row">
                    <div class="col">
                        <h5>Profil</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Nom : {{ $clients->nom }} </p>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Prenom : {{ $clients->prenom }} </p>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Adresse : {{ $clients->adresse }} </p>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Telephone : {{ $clients->telephone }} </p>

                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Email : {{ $clients->email }} </p>

                                </div>
                            </div>
                            <!-- Affichage des points de fidélité du client -->
                            <div class="alert alert-info" style="max-width:400px;margin:20px auto 0;">
                                <strong>Points de fidélité :</strong> {{ $clients->point ?? 0 }}
                            </div>


                        </div>


                    </div>
            </form>
        </div>
    </section>
    @include('partials/clients.footer')

@endsection

@section('script')
