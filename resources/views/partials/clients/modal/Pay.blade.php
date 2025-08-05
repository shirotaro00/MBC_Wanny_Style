<!-- Le modal avec le formulaire -->
<div class="modal fade" id="payModal" tabindex="-1" aria-labelledby="payModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <center>
                    <h5 class="modal-title" id="payModalLabel" style="color: black">Paiement</h5>
                    <p>Vous devez payer au moins 50% ou le total du montant </p>
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
                        <label for="Type" class="form-label">Montant</label>
                        <input type="text" class="form-control @error('type') is-invalid @enderror"
                         id="type" name="montant" placeholder="@error('montant'){{ $message }}@else Montant @enderror" required>
                    </div>

                       <div class="mb-3">
                        <label for="Type" class="form-label">Reference paiement</label>
                        <input type="text" class="form-control @error('Ref_paiement') is-invalid @enderror"
                         id="type" name="Ref_paiement" placeholder="@error('montant'){{ $message }}@else Reference paiement @enderror" required>
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
                        <button type="submit"  id="sign_in"
                            class="btn btn-success">Payé</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>



