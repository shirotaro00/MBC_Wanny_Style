<!-- Le modal avec le formulaire -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
     <center> <h5 class="modal-title" id="formModalLabel" style="color: black">Connexion</h5></center>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>

      <div class="modal-body">

        <form id="contactForm">
          <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="email" class="form-control" id="nom" name="email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Mots de passe</label>
            <input type="password" class="form-control" id="email" name="password" required>
          </div>

        </form>
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" form="contactForm">Se connecter</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>

    </div>
  </div>
</div>
