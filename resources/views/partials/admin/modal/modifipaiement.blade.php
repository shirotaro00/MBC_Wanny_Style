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
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom{{ $methode->id }}" name="nom" value="{{ $methode->nom }}" placeholder="Nom du compte" required>

                            @error('nom')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="telephone{{ $methode->id }}" class="form-label">Numéro</label>
                            <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone{{ $methode->id }}" name="telephone" value="{{ $methode->telephone }}" placeholder="Numéro du compte" required>

                            @error('telephone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="submit" onclick="verifierAcces('{{ auth()->user()->role }}')" id="sign_in"class="btn text-white" style="background-color: #0BA883">Modifier</button>
                            <button type="button text-white" class="btn" style="background-color: #DD3F26; color:aliceblue" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
