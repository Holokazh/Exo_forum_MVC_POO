<div class="backgroundLogin">
    <div class="pageLogin">
        <div class="whiteTransLogin">
            <div class="contentWhiteTrans">
                <div class="titlePageLogin flex">
                    <h2 class="h2PageLogin">Changement de l'email</h2>
                </div>
                <form action="?ctrl=security&method=changeEmail&id=<?= app\Session::getUser()->getId() ?>" class="formLogin flex" method="POST">
                    <div class="form-group">
                        <label for="emailNow">Adresse email actuelle</label>
                        <input type="text" id="emailNow" name="emailNow" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="newEmail">Nouvelle adresse email</label>
                        <input type="text" id="newEmail" name="newEmail" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="newEmail2">Confirmation de la nouvelle adresse email</label>
                        <input type="text" id="newEmail2" name="newEmail2" class="form-control" required>
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