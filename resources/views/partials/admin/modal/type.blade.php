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
                        <label for="nom" class="form-label">Type article</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
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
