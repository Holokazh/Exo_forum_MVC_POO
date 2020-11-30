<div class="backgroundLogin">
    <div class="pageLogin">
        <div class="whiteTransLogin">
            <div class="contentWhiteTrans">
                <div class="titlePageLogin flex">
                    <h2 class="h2PageLogin">Changement de pseudo</h2>
                </div>
                <form action="?ctrl=security&method=changePseudo&id=<?= app\Session::getUser()->getId() ?>" class="formLogin flex" method="POST">
                    <div class="form-group">
                        <label for="pseudoNow">Pseudo actuel</label>
                        <input type="text" id="pseudoNow" name="pseudoNow" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="newPseudo">Nouveau pseudo</label>
                        <input type="text" id="newPseudo" name="newPseudo" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="newPseudo2">Confirmation du nouveau pseudo</label>
                        <input type="text" id="newPseudo2" name="newPseudo2" class="form-control" required>
                    </div>

                    <input type="hidden" name="csrf_token" value="<?= $csrf_token; ?>">

                    <button type="submit" class="btn btn-primary">Modifier</button>

                    <a href="?ctrl=security&method=detailUser">Revenir en arrière</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>