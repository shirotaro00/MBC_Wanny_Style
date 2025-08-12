@extends('partials/clients.App');
@section('style')
    <style>
        .cart__total__procced {
            background-color: #fff;
            /* blanc */
            border-radius: 12px;
            box-shadow: 0 4px 12px rgb(0 0 0 / 0.1);
        }

        .cart__total__procced h6 {
            color: #DD3F26;
            border-radius: 2px;
            padding: 10px;
            font-weight: 700;
        }

        #total-general {
            color: #D77F27;
        }

        .btn-danger {
            background-color: #DD3F26;
            border-color: #DD3F26;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #b7321f;
            border-color: #b7321f;
        }

        .product__details__tab .nav-tabs .nav-link.active {
            border-color: transparent;
            border-bottom: 3px solid #D77F27;
        }

        .product__details__tab .nav-tabs .nav-link {
            color: #002012;
            transition: color 0.3s ease;
        }

        .product__details__tab .nav-tabs .nav-link:hover {
            color: #002012;
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 20px rgba(221, 63, 38, 0.3);
        }

        .card-title {
            font-weight: 600;
        }

        .card-text {
            font-size: 0.9rem;
            letter-spacing: 0.03em;
        }
    </style>
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
                        <table style="width:100%; border-collapse:separate; border-spacing:0 10px;">
                            <thead>
                                <tr>
                                    <th style="padding:10px;">Article</th>
                                    <th style="padding:10px;">Type</th>
                                    <th style="padding:10px;">Taille</th>
                                    <th style="padding:10px;">Couleur</th>
                                    <th style="padding:10px;">Catégorie</th>
                                    <th style="padding:10px;">Prix_unitaire</th>
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
                                        <tr data-id="{{ $id }}">
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
                                                    <input type="number" data-id="{{ $id }}" class="qty-input"
                                                        name="quantites[{{ $id }}]"
                                                        value="{{ $item['quantite'] }}" min="1">
                                                </div>
                                            </td>
                                            <td style="padding:10px;" class="cart__total sous-total"
                                                data-id="{{ $id }}">
                                                {{ number_format($sous_total, 0, ',', ' ') }} MGA
                                            </td>
                                            <td style="padding:10px;" class="cart__close">
                                                <button type="button" class="btn btn-link text-white"
                                                    style="background-color: #DD3F26" data-id="{{ $id }}"
                                                    data-toggle="modal" data-target="#deleteModal{{ $id }}">
                                                    <i class="fa fa-close"></i>
                                                </button>
                                            </td>



                                            @include('partials.clients.modal.deletepanier', ['id' => $id])
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
                        <a style="background-color:#D77F27;color:whitesmoke" href="{{ route('page.article') }}">Continue
                            l'achat</a>
                    </div>
                </div>

            </div>

            <div class="row">
                @if (session('panier') && count(session('panier')) > 0)
                    <form action="{{ route('commande.enregistrer') }}" method="POST" class="w-100">
                        @csrf
                        <div class="col-lg-4 offset-lg-8">
                            <div class="cart__total__procced shadow p-4 rounded bg-light">
                                <h6 class="mb-3">Total du panier</h6>
                                <ul class="list-unstyled">
                                    <li class="d-flex justify-content-between align-items-center fs-5 fw-bold">
                                        <span>Total :</span>
                                        <span id="total-general">{{ number_format($total, 0, ',', ' ') }} MGA</span>
                                    </li>
                                </ul>

                                <h6 class="mt-4 mb-2">Date livraison</h6>
                                <input type="date" class="form-control mb-3" name="date_livraison" id="dateLivraison"
                                    required>

                                <button type="submit" class="btn btn-danger w-100 fw-bold">Commander</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>

            <div class="col-lg-12 mt-4">
                <div class="product__details__tab bg-white p-4 rounded shadow-sm">
                    <ul class="nav nav-tabs border-0 mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active fw-bold text-black" data-toggle="tab" href="#tabs-1" role="tab"
                                style="font-size: 1.1rem;">Méthode de paiement</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                @foreach ($methode as $m)
                                    <div class="col">
                                        <div class="card h-100 shadow-sm border-0 rounded-3">
                                            <div class="card-img-top d-flex justify-content-center pt-3">
                                                <img src="{{ asset('assets/upload/' . $m->TypePaiement->photo) }}"
                                                    alt="Methode Paiement" style="max-width: 180px; height: auto;">
                                            </div>
                                            <div class="card-body text-center">
                                                <h5 class="card-title fw-semibold text-black" style="color: #002012">Nom
                                                    du compte : {{ $m->nom }}</h5>
                                                <p class="card-text text-black" style="color: #002012">Numéro téléphone :
                                                    {{ $m->telephone }}</p>
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
        document.querySelectorAll('.qty-input').forEach(input => {
            input.addEventListener('change', function() {
                const id = this.dataset.id;
                const quantite = this.value;
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                fetch('/panier/modifier', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token,
                        },
                        body: JSON.stringify({
                            id: id,
                            quantite: quantite
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const sousTotalElement = document.querySelector(
                                `.sous-total[data-id="${id}"]`);
                            if (sousTotalElement) sousTotalElement.textContent = data
                                .sous_total_formate + ' MGA';

                            const totalGeneral = document.getElementById('total-general');
                            if (totalGeneral) totalGeneral.textContent = data.total_formate + ' MGA';

                            Toastify({
                                text: "Quantité mise à jour avec succès",
                                duration: 3000,
                                gravity: "top",
                                position: "center",
                                backgroundColor: "green",
                            }).showToast();
                        } else if (data.error) {
                            Toastify({
                                text: data.error,
                                duration: 4000,
                                gravity: "top",
                                position: "center",
                                backgroundColor: "red",
                            }).showToast();
                        }
                    })
                    .catch(() => {
                        Toastify({
                            text: "Erreur lors de la mise à jour du panier",
                            duration: 4000,
                            gravity: "top",
                            position: "center",
                            backgroundColor: "red",
                        }).showToast();
                    });
            });
        });
    </script>

    <script>
        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.dataset.id;
                const form = document.getElementById('deleteForm');
                // Met à jour l'attribut action du formulaire pour correspondre à la route de suppression
                form.action = `/panier/supprimer/${id}`;
            });
        });
    </script>




    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputDate = document.getElementById('dateLivraison');
            const today = new Date();
            today.setDate(today.getDate() + 3);

            const yyyy = today.getFullYear();
            const mm = String(today.getMonth() + 1).padStart(2, '0');
            const dd = String(today.getDate()).padStart(2, '0');

            inputDate.min = `${yyyy}-${mm}-${dd}`;
        });
    </script>

@endsection
