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
                                    <p>Nom </p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Prenom </p>
                                    <input type="text">
                                </div>
                            </div>
                              <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Adresse </p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Telephone </p>
                                    <input type="text">
                                </div>
                            </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Email </p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Mot de passe </p>
                                    <input type="text">
                                </div>
                            </div>

                        </div>


                    </div>
                </form>
            </div>
        </section>
    @include('partials/clients.footer')

@endsection

@section('script')
