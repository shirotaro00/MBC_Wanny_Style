<!-- Modal de confirmation -->
@foreach ($methodes as $methode)
    <div class="modal fade" id="payDelete{{ $methode->id }}" tabindex="-1"
        aria-labelledby="payDeleteLabel{{ $methode->id }}" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="payDeleteLabel{{ $methode->id }}">Confirmer la
                        suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    Voulez-vous vraiment supprimer cet article ?
                </div>
                <div class="modal-footer">

                    <form action="{{ route('pay.destroy', $methode->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"  onclick="verifierAcces('{{ auth()->user()->role }}')" class="btn btn-danger btn-sm">Oui</button>
                    </form>

                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Non</button>


                </div>
            </div>
        </div>
    </div>
@endforeach
