<!-- Le modal avec le formulaire -->


<div class="modal fade" id="editpayModal" tabindex="-1" aria-labelledby="editpayModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <center>
                    <h5 class="modal-title" id="editpayModalLabel" style="color: black">Modifier paiement</h5>
                </center>

            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom compte</label>
                        <input type="text" class="form-control" id="nom" name="nom"
                            placeholder="Nom de compte" required>
                    </div>
                    <div class="mb-3">
                        <label for="numero" class="form-label">Numero</label>
                        <input type="text" class="form-control" id="numero" name="numero"
                            placeholder="Numero de compte" required>
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
