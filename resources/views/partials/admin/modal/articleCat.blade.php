<!-- Le modal avec le formulaire -->
<div class="modal fade" id="articleCatModal" tabindex="-1" aria-labelledby="articleCatModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <center>
                    <h5 class="modal-title" id="articleCatModalLabel" style="color: black">Categorie Article</h5>
                </center>

            </div>
            <div class="modal-body">

                <form action="{{ route('create.cat') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="article_id" class="form-label"> article
                        </label>
                        <select class="form-select form-control" id="article_id" name="article_id">
                            @foreach ($articles as $article)
                                <option value="{{ $article->id }}">{{ $article->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="type_article_id" class="form-label">Type article
                        </label>
                        <select class="form-select form-control" id="type_article_id" name="type_article_id">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->nom }}
                                </option>
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
