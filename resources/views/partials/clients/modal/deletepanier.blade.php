<div class="modal fade" id="deleteModal{{ $id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $id }}" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('panier.supprimer.lien', $id) }}">
      @csrf
      @method('DELETE')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel{{ $id }}">Confirmation suppression</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body">
          Voulez-vous vraiment supprimer l'article <strong>{{ session('panier')[$id]['nom'] ?? '' }}</strong> du panier ?
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn text-white" style="background-color: #DD3F26">Supprimer</button>
          <button type="button" class="btn text-white" style="background-color: #DDA233" data-bs-dismiss="modal">Annuler</button>
        </div>
      </div>
    </form>
  </div>
</div>
