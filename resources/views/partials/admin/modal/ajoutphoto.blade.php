<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('article.storage') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Ajout article</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>
                    <div class="mb-3">
                        <label for="detail_article_id" class="form-label">Couleur</label>
                        <select class="form-select form-control" id="detail_article_id" name="detail_article_id">
                            @foreach ($details as $detail)
                                <option value="{{ $detail->id }}">
                                    {{ $detail->couleur }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="taille" class="form-label">Taille</label>
                        <select class="form-select form-control" id="taille" name="taille">
                            <option value="L">L</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>

                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn text-white" style="background-color: #0BA883">Enregistrer</button>
                    <button type="button" class="btn text-white" style="background-color: #DD3F26" data-bs-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div>
