<link rel="stylesheet" href="{{ asset('assets/css/clientsmodal.css') }}">

<!-- Le modal avec le formulaire -->
<div class="modal fade" id="forminscription" tabindex="-1" aria-labelledby="forminscriptionLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title w-100 text-center" id="forminscriptionLabel" style="color: black">Inscription</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>

            <form action="{{ route('client.register') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                             <div class="password-wrapper ">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom">
                                @error('nom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <i class="fa fa-user toggle-user1"></i>
                            </div>
                        <div class="col-md-6">

                            <div class="password-wrapper mb-3">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom">
                                @error('prenom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <i class="fa fa-user toggle-user"></i>
                            </div>
                            <div class="password-wrapper mb-3">
                                <label for="adresse" class="form-label">Adresse</label>
                                <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse">
                                @error('adresse')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <i class="fa fa-address-book toggle-address"></i>
                            </div>
                            <div class="password-wrapper mb-3">
                                <label for="telephone" class="form-label">Téléphone</label>
                                <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone">
                                @error('telephone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <i class="fa fa-phone toggle-phone"></i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="password-wrapper mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <i class="fa fa-envelope toggle-envelope"></i>
                            </div>
                            <div class="password-wrapper mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <i class="fas fa-lock toggle-lock"></i>
                                <i class="fas fa-eye toggle-password" data-target="password" aria-hidden="true"></i>
                            </div>
                            <div class="password-wrapper1 mb-3">
                                <label for="password_confirmation" class="form-label">Confirme mot de passe</label>
                                <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" required />
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <i class="fa fa-check toggle-check"></i>
                                <i class="fas fa-eye toggle-password_confirmation" data-target="password_confirmation" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Créer compte</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </form>
        </div>
    </div>
</div>
