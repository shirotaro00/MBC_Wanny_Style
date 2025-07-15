<link rel="stylesheet" href="{{asset('assets/css/clientsmodal.css')}}">
<script src="{{asset('assets/js/clientsmodal.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Le modal avec le formulaire -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <center>
                    <h5 class="modal-title" id="formModalLabel" style="color: black">Connexion</h5>
                </center>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form id="contactForm" action="{{ route('client.auth') }}" method="POST">
                    @csrf
                    <div class="password-wrapper2">
                        <div class="mb-3">
                            <label for="Email" class="form-label">Email</label>
                            <input type="email"class="form-control" id="email" name="email" required>
                            <i class="fas fa-envelope toggle-envelope"></i>
                        </div>
                    </div>


                    <div class="password-wrapper2">
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <i class="fas fa-lock  toggle-lock2"></i>
                            <i class="fas fa-eye toggle-passwords" data-target="password" aria-hidden="true"></i>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" id="sign_in" class="btn btn-primary" form="contactForm">Se
                            connecter</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
      document.querySelectorAll('.toggle-passwords').forEach(icon => {
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

{{-- @if (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modalElement = document.getElementById('formModal');
            if (modalElement) {
                const modalInstance = new bootstrap.Modal(modalElement);
                modalInstance.show();
            }
        });
    </script>
@endif --}}


