  @extends('partials/clients.App');
  @section('style')
  <style>/* Style général des cartes */
.card {
  border-radius: 15px;
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
  transition: box-shadow 0.3s ease;
  margin-bottom: 30px;
  border: none;
}

.card:hover {
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
}

/* Titres des commandes */
.card-title {
  color: #DD3F26;
  font-weight: 700;
  font-size: 1.4rem;
  margin-bottom: 1rem;
}

/* Texte des infos client */
.card-body p {
  font-size: 0.95rem;
  margin-bottom: 0.3rem;
  color: #333;
}

/* Table des détails */
.table {
  border-collapse: separate !important;
  border-spacing: 0 10px !important;
  background-color: transparent;
}

.table thead tr {
  background-color: #DD3F26;
  color: white;
  border-radius: 12px;
  display: table;
  width: 100%;
  table-layout: fixed;
}

.table tbody tr {
  background-color: #fff;
  border-radius: 12px;
  box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
  display: table;
  width: 100%;
  table-layout: fixed;
  margin-bottom: 10px;
}

/* Style colonnes */
.table th, .table td {
  vertical-align: middle !important;
  padding: 12px 15px !important;
  text-align: center;
  font-size: 0.9rem;
}

/* Badge pour statut */
.badge-status {
  display: inline-block;
  padding: 0.4em 0.8em;
  font-size: 0.85rem;
  font-weight: 600;
  border-radius: 12px;
  color: white;
  text-transform: capitalize;
}

/* Couleurs badges selon statut */
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

/* Responsive improvements */
@media (max-width: 767px) {
  .card-body .row > div {
    margin-bottom: 1rem;
  }
  .table th, .table td {
    font-size: 0.8rem;
    padding: 8px 10px !important;
  }
}

  </style>
  @endsection
  @section('body')
      @include('partials/clients.navbar')
      <section class="checkout spad">
          <div class="container">

              <form action="#" class="checkout__form">
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
                                                  <h3>Historique des commandes</h3>
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
                                                                      <p>Ref-article : {{ $commande->reference_commande }}
                                                                        @php
    $statut = strtolower($commande->statut);
    $badgeClass = match($statut) {
        'livré' => 'badge-status badge-livre',
        'en cours' => 'badge-status badge-en-cours',
        'annulé' => 'badge-status badge-annule',
        default => 'badge-status badge-default',
    };
@endphp
<p>Statut : <span class="{{ $badgeClass }}">{{ ucfirst($commande->statut) }}</span></p>
                                                                      </p>
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
                                                                                  <td> {{ number_format($detail->prix_unitaire, 0, ',', ' ') }} MGA</td>
                                                                                  <td>{{ number_format($sousTotal, 0, ',', ' ') }}
                                                                                      MGA</td>
                                                                              </tr>
                                                                              @php $total += $sousTotal; @endphp
                                                                          @endforeach
                                                                      </tbody>
                                                                  </table>
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
          </form>
          </div>
      </section>
      @include('partials/clients.footer')

  @endsection

  @section('script')
