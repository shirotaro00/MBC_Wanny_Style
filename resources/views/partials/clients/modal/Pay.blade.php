<!-- Le modal avec le formulaire -->
<div class="modal fade" id="payModal" tabindex="-1" aria-labelledby="payModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <center>
                    <h5 class="modal-title" id="payModalLabel" style="color:#002012">Paiement</h5>
                    <p style="color:#002012">Vous devez payer au moins 50% ou le total du montant </p>
                </center>

            </div>
            <div class="modal-body">

                <form action="{{ route('paiement.store') }}" method="POST">
                    @csrf

                    @foreach ($commandes as $commande)
                        <input type="hidden" name="commande_id" value="{{ $commande->id }}">
                    @endforeach
                    <input type="text" name="user_id" value="{{ Auth::id() }}" hidden>
                    <div class="mb-3">
                        <label for="montant" class="form-label">Montant</label>
                        <input type="text" class="form-control @error('montant') is-invalid @enderror" id="montant"
                            name="montant" value="{{ old('montant') }}" placeholder="Montant" required>

                        @error('montant')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="Ref_paiement" class="form-label">Référence paiement</label>
                        <input type="text" class="form-control @error('Ref_paiement') is-invalid @enderror"
                            id="Ref_paiement" name="Ref_paiement" value="{{ old('Ref_paiement') }}"
                            placeholder="Référence paiement" required>

                        @error('Ref_paiement')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="methode_paiement_id" class="form-label"> Methode de paiement
                        </label>
                        <select class="form-select form-control" id="methode_paiement_id" name="methode_paiement_id">
                            @foreach ($methode as $m)
                                <option value="{{ $m->id }}">{{ $m->TypePaiement->type }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" id="sign_in" class="btn text-white"
                            style="background-color: #0BA883">Payé</button>
                        <button type="button text-white" class="btn"
                            style="background-color: #DD3F26; color:aliceblue" data-bs-dismiss="modal">Fermer</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
