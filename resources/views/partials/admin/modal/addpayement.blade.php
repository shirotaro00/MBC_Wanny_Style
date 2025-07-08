<!-- Le modal avec le formulaire -->

<div class="modal fade" id="payementModal" tabindex="-1" aria-labelledby="payementModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <center>
                    <h5 class="modal-title" id="payementModalLabel" style="color: black">Type de paiement</h5>
                </center>

            </div>
            <div class="modal-body">
                <form action="{{ route('store.methode') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="Type de payement" class="form-label">Type de paiement</label>
                        <input type="text" class="form-control" id="quantite" name="type" required>
                    </div>


                      <div class="mb-3">
                        <label for="numero" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo" required>
                    </div>


                    <div class="modal-footer">
                        <button type="submit" id="sign_in" class="btn btn-success">Ajouter</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
