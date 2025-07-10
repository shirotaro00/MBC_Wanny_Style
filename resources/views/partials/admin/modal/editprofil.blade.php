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
                <form action="{{ route('admin.utilisateur.update', $user->id) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nom</label>
                        <input type="text"  class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ $user->nom }}"
                            required>
                               @error('nom')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Prenom</label>
                        <input type="text"  class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ $user->prenom }}"
                            required>
                               @error('prenom')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Adresse</label>
                        <input type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{$user->adresse }}"
                            required>
                               @error('adresse')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Téléphone</label>
                        <input type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                            value="{{ $user->telephone }}" required>
                              @error('telephone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}"
                            required>
                                 @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                                <div class="password-wrapper">
                    <input type="password" class="form-control @error('password') is-invalid @enderror "
                        placeholder="@error('password'){{ $message }}@else Mot de passe @enderror" name="password"
                        id="password" required />
                    <i class="fas fa-eye toggle-password" data-target="password" aria-hidden="true"></i>
                </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Mettre à jour</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<style>.password-wrapper {
  position: relative;
  /* display: inline-block; ou block à 100% si tu veux que ça prenne toute la largeur */
}

/* ajoute un padding à droite pour que le texte ne chevauche pas l’icône */
.password-wrapper .form-control {
  /* padding-left: 2.5rem;   espace pour l'icône lock à gauche */
    padding-right: 20rem;
    width: 100%; /* pour que le champ prenne toute la largeur */
}

/* icône positionnée à l’intérieur du champ */
.password-wrapper .toggle-password {
  position: absolute;
  top: 50%;
  right: 0.75rem;      /* ajustable selon la taille que tu veux */
  transform: translateY(-50%);
  cursor: pointer;
  color: #aaa;
  font-size: 1.1rem;   /* tu peux ajuster la taille */
  user-select: none;   /* empêche la sélection du texte si double‑clic */
}

</style>
<script>
     document.querySelectorAll('.toggle-password').forEach(icon => {
      icon.addEventListener('click', () => {
        const targetId = icon.getAttribute('data-target');
        const input = document.getElementById(targetId);
        if (input.type === "password") {
          input.type = "text";
          icon.classList.remove('fa-eye');
          icon.classList.add('fa-eye-slash');
        } else {
          input.type = "password";
          icon.classList.remove('fa-eye-slash');
          icon.classList.add('fa-eye');
        }
      });
    });
</script>


