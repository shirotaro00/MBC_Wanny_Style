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
                        <input type="text" class="form-control @error('couleur') is-invalid @enderror" id="couleur" name="couleur" placeholder="@error('couleur'){{ $message }}@else Couleur @enderror" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" onclick="verifierAcces('{{ auth()->user()->role }}')"  id="sign_in" class="btn text-white" style="background-color: #0BA883">Ajouter</button>
                        <button type="button text-white" class="btn" style="background-color: #DD3F26; color:aliceblue" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

