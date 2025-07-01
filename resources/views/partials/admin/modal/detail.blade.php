<!-- Le modal avec le formulaire -->
<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
     <center> <h5 class="modal-title" id="detailsModalLabel" style="color: black">Type Article</h5></center>

      </div>
      <div class="modal-body">

        <form  action="" method="POST">
            @csrf
          <div class="mb-3">
            <label for="nom" class="form-label">Couleurs</label>
            <input type="text" class="form-control" id="couleur" name="couleur" required>
          </div>

          <div class="mb-3">
            <label for="nom" class="form-label">Taille</label>
            <input type="text" class="form-control" id="Taille" name="Taille" required>
          </div>


          <div class="mb-3">
            <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>


           <div class="modal-footer">
            <button type="submit" id="sign_in" class="btn btn-success" >Ajouter</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
