<!-- Le modal avec le formulaire -->
<div class="modal fade" id="categorieModal" tabindex="-1" aria-labelledby="categorieModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <center>
                    <h5 class="modal-title" id="categorieModalLabel" style="color: black">ajout stock Article</h5>
                </center>

            </div>
            <div class="modal-body">

                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nom" class="form-label">Quantite</label>
                        <input type="number" class="form-control" id="quantite" name="quantite" required>
                    </div>

                    <div class="mb-3" >
                        <label for="civilite" class="form-label">Detail</label>
                        <select class="form-select form-control" id="defaultSelect" name="details">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>

                    <div class="modal-footer" >
                        <button type="submit" id="sign_in" class="btn btn-success">Ajouter</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
