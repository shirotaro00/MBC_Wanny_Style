<!-- Le modal avec le formulaire -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
     <center> <h5 class="modal-title" id="formModalLabel" style="color: black">Connexion</h5></center>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
      </div>
      <div class="modal-body">
           @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <form id="contactForm" action="{{ route('client.auth') }}" method="POST">
            @csrf
          <div class="mb-3">
            <label for="Email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
           <div class="modal-footer">
            <button type="submit" id="sign_in" class="btn btn-primary" form="contactForm">Se connecter</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
