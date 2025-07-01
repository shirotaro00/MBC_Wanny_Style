@extends('pageadmin.dashbord.admin')

@section('body')
@include('partials.admin.modal.categorie')
@include('partials.admin.modal.type')
@include('partials.admin.modal.detail')

    <div class="wrapper">
        @include('partials.admin.sidebar')

        <div class="main-panel">
            @include('partials.admin.header')


            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h3 class="fw-bold mb-3">Ajout article</h3>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Form Elements</div>
                                </div>

<div class="my-4">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categorieModal">Catégorie article</button>
    <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#typeModal">Type article</button>
    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#detailsModal">Détails article</button>
</div>




<!-- Modal 3 : Détails article -->
<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailsModalLabel">Ajouter les détails d'article</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="nomArticle" class="form-label">Nom de l'article</label>
          <input type="text" class="form-control" id="nomArticle" name="nomArticle" required>
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <div class="mb-3">
          <label for="prix" class="form-label">Prix</label>
          <input type="number" class="form-control" id="prix" name="prix" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Enregistrer</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
      </div>
    </form>
  </div>
</div>
                                <div class="card-action">
                                    <button class="btn btn-success">Submit</button>
                                    <button class="btn btn-danger">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection






