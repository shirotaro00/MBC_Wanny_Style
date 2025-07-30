@extends('partials/clients.App');
@section('style')
@endsection
@section('body')
    @include('partials/clients.navbar')
    @include('partials.clients.modal.inscription')
    @include('partials.clients.modal.connexion')



    <!-- Shop Section Begin -->
    <section class="shop spad">
    <div class="container">
        <div class="row">
            {{-- Sidebar des filtres --}}
            <div class="col-lg-3 col-md-3">
                <div class="shop__sidebar">
                    <form method="GET" action="{{ route('page.articles') }}">
                        {{-- Catégories --}}
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>Catégories</h4>
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">
                                    @foreach (['Homme', 'Femme'] as $cat)
                                        <div class="card">
                                            <div class="card-heading">
                                                <label>
                                                    <input type="checkbox" name="categorie[]"
                                                        value="{{ $cat }}"
                                                        {{ in_array($cat, $categories ?? []) ? 'checked' : '' }}>
                                                    {{ $cat }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        {{-- Tailles --}}
                        <div class="sidebar__sizes mt-3">
                            <div class="section-title">
                                <h4>Taille</h4>
                            </div>
                            <div class="size__list">
                                @foreach (['l', 'm', 's', 'xl', 'xxl'] as $taille)
                                    <label for="taille_{{ $taille }}">
                                        {{ strtoupper($taille) }}
                                        <input type="checkbox" id="taille_{{ $taille }}" name="taille[]"
                                            value="{{ $taille }}"
                                            {{ in_array($taille, $tailles ?? []) ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        {{-- Couleurs --}}
                        <div class="sidebar__color mt-3">
                            <div class="section-title">
                                <h4>Couleur</h4>
                            </div>
                            <div class="size__list color__list">
                                @foreach (['Noir', 'Blanc', 'Rouge', 'Gris', 'Bleu', 'Vert', 'Jaune', 'Grenat', 'Orange', 'Marron', 'Rose', 'Violet'] as $color)
                                    <label for="color_{{ strtolower($color) }}">
                                        {{ $color }}
                                        <input type="checkbox" id="color_{{ strtolower($color) }}" name="couleur[]"
                                            value="{{ $color }}"
                                            {{ in_array($color, $couleurs ?? []) ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="mt-2">
                            <a href="{{ route('page.article') }}" class="btn btn-secondary w-100">Réinitialiser</a>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Zone des articles --}}
            <div class="col-lg-9 col-md-9">
                <div class="row">
                    {{-- Message d'alerte si besoin --}}
                    @if (!empty($message))
                        <div class="col-12">
                            <div class="alert alert-warning text-center">
                                <i class="fas fa-exclamation-circle me-2"></i> {{ $message }}
                            </div>
                        </div>
                    @endif

                    {{-- Liste des articles --}}
                    @forelse ($articles as $article)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg"
                                    data-setbg="{{ asset('assets/upload/' . $article->photo) }}">
                                    <ul class="product__hover">
                                        <li>
                                             <a href="{{ asset('assets/upload/' . $article->photo) }}" class="image-popup">
                                                <span><i class="fas fa-up-right-and-down-left-from-center"></i></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('page.details', $article->id) }}">
                                                <span><i class="fas fa-info-circle"></i></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('panier.ajouter', $article->id) }}">
                                                <span><i class="fas fa-cart-plus"></i></span>
                                            </a>
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
                                    <div class="product__price">
                                        {{ number_format($article->prix, 0, ',', ' ') }} MGA
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        @if (empty($message))
                            <div class="col-12">
                                <div class="alert alert-info text-center">
                                    Aucun article disponible pour le moment.
                                </div>
                            </div>
                        @endif
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Script pour soumission automatique du formulaire --}}
<script>
    document.querySelectorAll('.shop__sidebar input[type="checkbox"]').forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            this.closest('form').submit();
        });
    });
</script>

    <!-- Shop Section End -->


    <!-- Footer Section Begin -->
    @include('partials/clients.footer')
@endsection
@section('script')
@endsection
