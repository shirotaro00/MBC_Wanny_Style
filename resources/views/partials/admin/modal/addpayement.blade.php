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
                <form action="{{ route('store.type') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="Type de payement" class="form-label">Type de paiement</label>
                        <input type="text" class="form-control @error('type') is-invalid @enderror" id="type"
                            name="type" required>
                        @error('type')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="numero" class="form-label">Photo</label>
                        <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo"
                            name="photo" required>
                        @error('photo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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
