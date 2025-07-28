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
                        <span>Article</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <form method="GET" action="{{ route('page.article') }}">
                            <div class="sidebar__categories">
                                <div class="section-title">
                                    <h4>Categories</h4>
                                </div>
                                <div class="categories__accordion">
                                    <div class="accordion" id="accordionExample">
                                        @foreach (['Homme', 'Femme'] as $cat)
                                            <div class="card">
                                                <div class="card-heading">
                                                    <label>
                                                        <input type="checkbox" name="categorie[]"
                                                            value="{{ $cat }}" @checked(in_array($cat, $categories ?? []))>
                                                        {{ $cat }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar__sizes">
                                <div class="section-title">
                                    <h4>Taille</h4>
                                </div>
                                <div class="size__list">
                                    @foreach (['l', 'm', 's', 'xl', 'xxl'] as $taille)
                                        <label for="{{ $taille }}">
                                            {{ $taille }}
                                            <input type="checkbox" id="{{ $taille }}" name="taille[]"
                                                value="{{ $taille }}" @checked(in_array($taille, $tailles ?? []))>
                                            <span class="checkmark"></span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="sidebar__color">
                                <div class="section-title">
                                    <h4>Couleur</h4>
                                </div>
                                <div class="size__list color__list">
                                    @foreach (['Noir', 'Blanc', 'Rouge', 'Gris', 'Bleu', 'Vert', 'Jaune', 'Grenat', 'Orange', 'Marron', 'Rose', 'Violet'] as $color)
                                        <label for="{{ strtolower($color) }}">
                                            {{ $color }}
                                            <input type="checkbox" id="{{ strtolower($color) }}" name="couleur[]"
                                                value="{{ $color }}" @checked(in_array($color, $couleurs ?? []))>
                                            <span class="checkmark"></span>
                                        </label>
                                    @endforeach

                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary w-100">Filtrer</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="row">
                        @php $message = $message ?? null; @endphp
                        @if ($message)
                            <div class="col-12 text-center">
                                <div class="alert alert-warning mt-4 mb-4">
                                    {{ $message }}
                                </div>
                            </div>
                        @else
                            @foreach ($articles as $article)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg"
                                            data-setbg="{{ asset('assets/upload/' . $article->photo) }}">
                                            <ul class="product__hover">
                                                <li><a href="{{ asset('assets/upload/' . $article->photo) }}"
                                                        class="image-popup"><span><i
                                                                class="fas fa-up-right-and-down-left-from-center"></i></span></a>
                                                </li>
                                                <li><a href="{{ route('page.details', $article->id) }}"><span><i
                                                                class="fas fa-info-circle"></i></span></a></li>
                                                <li><a href="#"><span><i class="fas fa-cart-plus"></i></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__item__text">
                                            <h6><a href="#">{{ $article->nom }}</a></h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product__price">{{ number_format($article->prix, 0, ',', ' ') }}
                                                MGA
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
    </section>
    <!-- Shop Section End -->


    <!-- Footer Section Begin -->
    @include('partials/clients.footer')
@endsection
@section('script')
@endsection
