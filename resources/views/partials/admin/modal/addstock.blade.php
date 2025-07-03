<!-- Le modal avec le formulaire -->
@foreach ($details as $detail)
<div class="modal fade" id="categorieModal" tabindex="-1" aria-labelledby="categorieModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <center>
                    <h5 class="modal-title" id="categorieModalLabel" style="color: black">ajout stock Article</h5>
                </center>

            </div>
            <div class="modal-body">
                <form action="{{ route('admin.ajouterStock', ['detail_article_id' => $detail->id]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nom" class="form-label">Quantite</label>
                        <input type="number" class="form-control" id="quantite" name="quantite" required>
                    </div>

                    <div class="mb-3">
                       <input type="hidden" name="detail_article_id" value="{{ $detail->id }}">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" id="sign_in" class="btn btn-success">Ajouter</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
