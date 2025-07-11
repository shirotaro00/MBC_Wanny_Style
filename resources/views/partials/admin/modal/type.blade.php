<!-- Le modal avec le formulaire -->
<div class="modal fade" id="typeModal" tabindex="-1" aria-labelledby="typeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <center>
                    <h5 class="modal-title" id="typeModalLabel" style="color: black">Type Article</h5>
                </center>

            </div>
            <div class="modal-body">

                <form action="{{ route('create.type') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="Type" class="form-label">Type article</label>
                        <input type="text" class="form-control @error('type') is-invalid @enderror"
                         id="type" name="type" placeholder="@error('type'){{ $message }}@else Type article @enderror" required>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" onclick="verifierAcces('{{ auth()->user()->role }}')" id="sign_in"
                            class="btn btn-success">Ajouter</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>



