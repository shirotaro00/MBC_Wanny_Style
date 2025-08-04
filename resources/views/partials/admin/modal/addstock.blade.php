<!-- Le modal avec le formulaire -->
@foreach ($articles as $article)
    <div class="modal fade" id="categorieModal" tabindex="-1" aria-labelledby="categorieModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <center>
                        <h5 class="modal-title" id="categorieModalLabel" style="color: black">ajout stock Article</h5>
                    </center>

                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.ajouterStock', $article->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="article_id" class="form-label"> Article
                            </label>
                            <select class="form-select form-control" id="article_id" name="article_id">
                                <option value="{{ $article->id }}">{{ $article->nom }}
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nom" class="form-label">Quantite</label>
                            <input type="text" class="form-control @error('quantite') is-invalid @enderror"
                                id="quantite" name="quantite" placeholder="Quantite" required>
                            @error('quantite')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="Date" class="form-label">Date Ajout</label>
                            <input type="date" class="form-control" id="date" name="date_stock" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" onclick="verifierAcces('{{ auth()->user()->role }}')" id="sign_in"
                                class="btn text-white" style="background-color: #0BA883">Ajouter</button>
                            <button type="button text-white" class="btn" style="background-color: #DD3F26; color:aliceblue" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
