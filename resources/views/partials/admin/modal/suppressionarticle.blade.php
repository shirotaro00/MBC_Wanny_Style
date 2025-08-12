<!-- Modal de confirmation -->
@foreach ($articles as $article)
    <div class="modal fade" id="modalDelete{{ $article->id }}" tabindex="-1"
        aria-labelledby="modalLabel{{ $article->id }}" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel{{ $article->id }}">Confirmer la
                        suppression</h5>
                </div>
                <div class="modal-body">
                    Voulez-vous vraiment supprimer cet article ?
                </div>
                <div class="modal-footer">

                    <form action="{{ route('articles.destroy', $article->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"  onclick="verifierAcces('{{ auth()->user()->role }}')" class="btn-sm text-white" style="background-color: #0BA883">Oui</button>
                    </form>

                    <button type="btn-sm text-white" class="btn-sm" style="background-color: #DD3F26; color:aliceblue" data-bs-dismiss="modal">Non</button>


                </div>
            </div>
        </div>
    </div>
@endforeach
