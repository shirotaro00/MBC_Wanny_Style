<link rel="stylesheet" href="{{ asset('assets/css/clientsmodal.css') }}">
<script src="{{ asset('assets/js/clientsmodal.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Le modal avec le formulaire -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title w-100 text-center" id="formModalLabel" style="color: #002012">Connexion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                @if (session('login_error'))
                    <div class="alert alert-danger">
                        {{ session('login_error') }}
                    </div>
                @endif
                <form id="contactForm" action="{{ route('client.auth') }}" method="POST">
                    @csrf
                    <div class="password-wrapper">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control " style="width: 170%;" id="email" name="email" required>

                            <i class="fas fa-envelope toggle-envelope"></i>

                    </div>
                    <div class="password-wrapper ">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control "style="width: 170%;" id="password" name="password" required>

                            <i class="fas fa-lock toggle-lock"></i>
                            <i class="fas fa-eye toggle-password1" data-target="password" aria-hidden="true" ></i>

                    </div>
                    <div class="modal-footer mt-2">
                        <button type="submit" id="sign_in" class="btn text-white" style="background-color: #0BA883" >Se connecter</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




