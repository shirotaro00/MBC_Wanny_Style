@extends('partials/clients.App');
@section('style')
@endsection
@section('body')
    @include('partials/clients.navbar')

    <!-- Banner Section Begin -->
    <section class="banner set-bg" data-setbg="{{ asset('assets/img/banner-1.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-8 m-auto">
                    <div class="banner__slider owl-carousel">
                        <div class="banner__item">
                            <div class="banner__text">
                                <span style="color: #DD3F26">Wanny-style collection</span>
                                <h4>Wanny promeut sa nouvelle
                                    collection Gasigasy</h4>
                                <a href="#"></a>
                            </div>
                        </div>
                        <div class="banner__item">
                            <div class="banner__text">
                                <span style="color: #DD3F26">Wanny-style collection</span>
                                <h4>Wanny promeut sa nouvelle
                                    collection Gasigasy</h4>
                                <a href="#"></a>
                            </div>
                        </div>
                        <div class="banner__item">
                            <div class="banner__text">
                                <span style="color: #DD3F26">Wanny-style collection</span>
                                <h4>Wanny promeut sa nouvelle
                                    collection Gasigasy</h4>
                                <a href="#"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="section-title">
                        <h4 style="color:#002012">Nouveautés</h4>
                    </div>
                </div>
            </div>
            {{-- produit forech --}}

            <div class="row property__gallery">
                @foreach ($articles as $article)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                        <div class="product__item">
                            <div class="product__item__pic set-bg"
                                data-setbg="{{ asset('assets/upload/' . $article->photo) }}">
                                @if ($article->quantite == 0)
                                    <div class="label" style="background:#DD3F26;color:#fff">Indisponible</div>
                                @elseif ($article->created_at >= now()->subDays(7))
                                    <div class="label new">Nouveau</div>
                                @endif
                                <ul class="product__hover">
                                    <li><a href=" {{ asset('assets/upload/' . $article->photo) }} "
                                            class="image-popup"><span><i
                                                    class="fas fa-up-right-and-down-left-from-center"></i></span></a></li>
                                    <li><a href="{{ route('page.details', $article->id) }}"><span><i
                                                    class="fas fa-info-circle"></i></span></i>
                                        </a></li>
                                    @if ($article->quantite > 0)
                                        <li><a href="{{ route('client.monpanier', $article->id) }}"><span><i
                                                        class="fas fa-cart-plus"></i></span></a></li>
                                    @else
                                        <li><a href="#" style="pointer-events: none; opacity: 1;"><span><i
                                                        class="fas fa-cart-plus"></i></span></a></li>
                                    @endif
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
                                <div class="product__price">{{ number_format($article->prix, 0, ',', ' ') }} MGA</div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
    </section>
    <!-- Product Section End -->


    <!-- About Section Begin -->
<section class="about spad" style="background: #f9f9f9; padding: 60px 0;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about__pic set-bg" data-setbg="{{ asset('assets/img/collage.png') }}" style="border-radius: 15px; box-shadow: 0 8px 20px rgba(221,63,38,0.3); height: 400px; background-size: cover; background-position: center;"></div>
            </div>
            <div class="col-lg-6">
                <div class="about__text">
                    <div class="section-title">
                        <h4 style="color: #DD3F26; font-weight: 700;">À propos de Wanny Style</h4>
                    </div>
                    <p style="font-size: 1.1rem; color: #333; margin-bottom: 25px;">
                        Wanny Style est votre plateforme incontournable pour découvrir et acheter les dernières tendances de la mode Gasigasy. Nous mettons en avant la créativité locale avec des collections uniques, modernes et authentiques.
                    </p>
                    <p style="font-size: 1rem; color: #555; line-height: 1.6;">
                        Notre mission est de promouvoir l'artisanat malgache et offrir une expérience shopping agréable, sécurisée et rapide. Rejoignez la communauté Wanny et faites partie du mouvement qui valorise la mode durable et responsable.
                    </p>
                    <a href="" class="btn" style="background: #DD3F26; color: #fff; padding: 10px 30px; border-radius: 30px; font-weight: 600; display: inline-block; margin-top: 20px; transition: background 0.3s;">
                        En savoir plus
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

    @include('partials/clients.footer')
@endsection

@section('script')
@endsection
