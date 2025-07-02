<!-- Le modal avec le formulaire -->
<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <center>
                    <h5 class="modal-title" id="detailsModalLabel" style="color: black">Details Article</h5>
                </center>

            </div>
            <div class="modal-body">

                <form action="{{ route('details.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="couleur" class="form-label">Couleur</label>
                        <input type="text" class="form-control" id="couleur" name="couleur" required>
                    </div>

                    <div class="mb-3">
                        <label for="taille" class="form-label">Taille</label>
                        <input type="text" class="form-control" id="taille" name="taille" required>
                    </div>


                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="article_id" class="form-label">article
                        </label>
                        <select class="form-select form-control" id="article_id" name="article_id">
                            @foreach ($articles as $article)
                                <option value="{{ $article->id }}">{{ $article->nom }}</option>
                            @endforeach
                        </select>
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
