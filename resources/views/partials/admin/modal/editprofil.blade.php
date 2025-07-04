<!-- Le modal avec le formulaire -->

<div class="modal fade" id="editprofilModal" tabindex="-1" aria-labelledby="editprofilModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <center>
                    <h5 class="modal-title" id="editprofilModalLabel" style="color: black">Modification Profil</h5>
                </center>

            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="Type de payement" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                    <div class="mb-3">
                        <label for="numero" class="form-label">Prenom</label>
                        <input type="text" class="form-control" id="Prenom" name="Prenom" required>
                    </div>

                    <div class="mb-3">
                        <label for="numero" class="form-label">Adresse</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" required>
                    </div>

                    <div class="mb-3">
                        <label for="telephone" class="form-label">Telephone</label>
                        <input type="text" class="form-control" id="telephone" name="telephone" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Mots de passe</label>
                        <input type="password" class="form-control" id="password" name="password" required>
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
