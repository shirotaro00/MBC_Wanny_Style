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
                <form action="{{ route('admin.utilisateur.update', $admin->id) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nom</label>
                        <input type="text" class="form-control" name="nom" value="{{ $admin->nom }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Prenom</label>
                        <input type="text" class="form-control" name="prenom" value="{{ $admin->prenom }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Adresse</label>
                        <input type="text" class="form-control" name="adresse" value="{{$admin->adresse }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Téléphone</label>
                        <input type="text" class="form-control" name="telephone"
                            value="{{ $admin->telephone }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $admin->email }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Mettre à jour</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
