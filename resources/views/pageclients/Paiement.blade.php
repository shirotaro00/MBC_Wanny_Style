  @extends('partials/clients.App');
  @section('style')
  <style>
    /* Carte commande */
.card {
  border-radius: 15px;
  box-shadow: 0 6px 20px rgba(0,0,0,0.1);
  margin-bottom: 30px;
  border: none;
  transition: box-shadow 0.3s ease;
}
.card:hover {
  box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

/* Titre */
.card-title {
  color: #DDA233;
  font-weight: 700;
  font-size: 1.5rem;
  margin-bottom: 1.2rem;
}

/* Info client & commande */
.card-body p {
  font-size: 1rem;
  margin-bottom: 0.4rem;
  color: #444;
}

/* Table des détails */
.table {
  border-collapse: separate !important;
  border-spacing: 0 12px !important;
  background-color: transparent;
  margin-top: 20px;
}
.table thead tr {
  background-color: #DDA233;
  color: white;
  border-radius: 12px;
  display: table;
  width: 100%;
  table-layout: fixed;
}
.table tbody tr {
  background-color: #fff;
  border-radius: 12px;
  box-shadow: 0 3px 10px rgba(0,0,0,0.05);
  display: table;
  width: 100%;
  table-layout: fixed;
  margin-bottom: 10px;
}
.table th, .table td {
  vertical-align: middle !important;
  padding: 12px 15px !important;
  text-align: center;
  font-size: 0.95rem;
}

/* Badge statut */
.badge-status {
  display: inline-block;
  padding: 0.4em 0.8em;
  font-size: 0.85rem;
  font-weight: 600;
  border-radius: 12px;
  color: white;
  text-transform: capitalize;
}
.badge-livre {
  background-color: #28a745;
}
.badge-en-cours {
  background-color: #ffc107;
  color: #212529;
}
.badge-annule {
  background-color: #dc3545;
}
.badge-default {
  background-color: #6c757d;
}

/* Bouton paiement */
.btn-payment {
  background-color: #DDA233;
  color: white;
  font-weight: 600;
  padding: 0.6rem 1.4rem;
  border-radius: 30px;
  box-shadow: 0 4px 12px rgba(221,162,51,0.5);
  transition: background-color 0.3s ease;
}
.btn-payment:hover {
  background-color: #c39322;
  color: white;
  box-shadow: 0 6px 18px rgba(221,162,51,0.7);
}

/* Texte montants */
.text-right {
  text-align: right;
  font-weight: 600;
  font-size: 1rem;
  margin-top: 0.5rem;
  color: #333;
}

/* Responsive */
@media (max-width: 767px) {
  .card-body .row > div {
    margin-bottom: 1.5rem;
  }
  .table th, .table td {
    font-size: 0.8rem;
    padding: 8px 10px !important;
  }
  .card-title {
    font-size: 1.3rem;
  }
}

  </style>
  @endsection
  @section('body')
      @include('partials/clients.navbar')
      @include('partials.clients.modal.Pay')

      <section class="checkout spad">
          <div class="container">


              <div class="row">
                  <div class="container ">
                      <div class="page-inner">
                          <div class="page-header">


                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="card">
                                      <div class="card-header">
                                          <center>
                                              <h3>Commande valide </h3>
                                          </center>

                                      </div>

                                      <div class="row row-cols-1 row-cols-md-1 g-4 justify-content-center"
                                          style="margin-top: 20px; padding-left: 30px; padding-right: 30px; ">
                                          @foreach ($commandes as $commande)
                                              <div class="col mb-4">
                                                  <div class="card h-100 "
                                                      style="margin-left: 10px; margin-right: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.25);">
                                                      <div class="card-body">
                                                          <h5 class="card-title">Commande le:
                                                              {{ \Carbon\Carbon::parse($commande->date_commande)->format('d/m/Y') }}
                                                          </h5>


                                                          <div class="row">
                                                              <div class="col-md-6">
                                                                  <p>Nom : {{ $commande->user?->nom ?? 'Inconnu' }} </p>
                                                                  <p>Prenom :
                                                                      {{ $commande->user?->prenom ?? 'Inconnu' }} </p>
                                                                  <p>Adresse :
                                                                      {{ $commande->user?->adresse ?? 'Inconnu' }} </p>
                                                                  <p>Telephone :
                                                                      {{ $commande->user?->telephone ?? 'Inconnu' }}
                                                                  </p>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <p>Date de livraison : {{ $commande->date_livraison }}
                                                                  </p>
                                                                  <p>Ref-commande : {{ $commande->reference_commande }}
                                                                  </p>
                                                                  @php
    $statusClass = match(strtolower($commande->statut)) {
        'validée' => 'badge-status badge-livre',
        'en cours' => 'badge-status badge-en-cours',
        default => 'badge-status badge-default',
    };
    $paymentClass = match(strtolower($commande->statut_paiement)) {
        'payé' => 'badge-status badge-livre',
        'acompte' => 'badge-status badge-en-cours',
        default => 'badge-status badge-default',
    };
@endphp
<p>Statut : <span class="{{ $statusClass }}">{{ ucfirst($commande->statut) }}</span></p>
<p>Statut de paiement : <span class="{{ $paymentClass }}">{{ ucfirst($commande->statut_paiement) }}</span></p
                                                              </div>
                                                          </div>

                                                          <div class="table-responsive ">
                                                              <table class="table  ">
                                                                  <thead>
                                                                      <tr>
                                                                          <th scope="col">Nom article</th>
                                                                          <th scope="col">Quantité</th>
                                                                          <th scope="col">Categorie</th>
                                                                          <th scope="col">Type</th>
                                                                          <th scope="col">Taille</th>
                                                                          <th scope="col">Couleur</th>
                                                                          <th scope="col">Prix unitaire</th>
                                                                          <th scope="col">Total</th>
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>

                                                                      @php $total = 0; @endphp
                                                                      @foreach ($commande->DetailCommande as $detail)
                                                                          @php $sousTotal = $detail->prix_unitaire * $detail->quantite; @endphp
                                                                          <tr>
                                                                              <td>{{ $detail->article->nom ?? 'Article supprimé' }}
                                                                              </td>
                                                                              <td>{{ $detail->quantite }}</td>
                                                                              <td>{{ $detail->article->categorie ?? '-' }}
                                                                              </td>
                                                                              <td>{{ $detail->TypeArticle?->type ?? '-' }}
                                                                              </td>
                                                                              <td>{{ $detail->article->taille ?? '-' }}
                                                                              </td>
                                                                              <td>{{ $detail->detailArticle?->couleur ?? '-' }}
                                                                              </td>
                                                                              <td>{{ number_format($detail->prix_unitaire, 0, ',', ' ') }}
                                                                                  MGA</td>
                                                                              <td>{{ number_format($sousTotal, 0, ',', ' ') }}
                                                                                  MGA</td>
                                                                          </tr>
                                                                          @php $total += $sousTotal; @endphp
                                                                      @endforeach
                                                                  </tbody>
                                                              </table>
                                                          </div>
                                                          @php
                                                              $totalPaye = $commande->paiements->sum('montant');
                                                              $reste = max($total - $totalPaye, 0);
                                                          @endphp
                                                          <p style="text-align: right;"><strong>Montant déjà payé :
                                                                  {{ number_format($totalPaye, 0, ',', ' ') }}</strong>MGA
                                                          </p>
                                                          <p style="text-align: right;"><strong>Reste à payer :
                                                                  {{ number_format($reste, 0, ',', ' ') }}</strong>MGA
                                                          </p>
                                                          <div class="d-flex justify-content-end mt-5">
                                                              <button class="btn text-white"
                                                                  style="background-color: #D77F27" data-bs-toggle="modal"
                                                                  data-bs-target="#payModal"><i class="fa-solid fa-credit-card" style="margin-right: 5px"></i>
                                                                  Paiement</button>

                                                          </div>

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

              </div>


          </div>

          </div>
      </section>
      @include('partials/clients.footer')

  @endsection

  @section('script')
