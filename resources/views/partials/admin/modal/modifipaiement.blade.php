<!-- Le modal avec le formulaire -->
@foreach ($methodes as $methode)
    <div class="modal fade" id="editpayModal" tabindex="-1" aria-labelledby="editpayModalLabel{{ $methode->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <center>
                        <h5 class="modal-title" id="editpayModalLabel{{ $methode->id }}" style="color: black">Modifier paiement</h5>
                    </center>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pay.update', $methode->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nom{{ $methode->id }}" class="form-label">Nom du compte</label>
                            <input type="text" class="form-control" id="nom{{ $methode->id }}" name="nom" value="{{ $methode->nom }}" placeholder="Nom du compte" required>
                        </div>
                        <div class="mb-3">
                            <label for="telephone{{ $methode->id }}" class="form-label">Numéro</label>
                            <input type="text" class="form-control" id="telephone{{ $methode->id }}" name="telephone" value="{{ $methode->telephone }}" placeholder="Numéro du compte" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" onclick="verifierAcces('{{ auth()->user()->role }}')" id="sign_in" class="btn btn-success">Modifier</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
