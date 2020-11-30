<div class="backgroundLogin">
    <div class="pageLogin">
        <div class="whiteTransLogin">
            <div class="contentWhiteTrans">
                <div class="titlePageLogin flex">
                    <h2 class="h2PageLogin">Changement de mot de passe</h2>
                </div>
                <form action="?ctrl=security&method=changePassword&id=<?= app\Session::getUser()->getId() ?>" class="formLogin flex" method="POST">
                    <div class="form-group">
                        <label for="mdpNow">Mot de passe actuel</label>
                        <input type="password" id="mdpNow" name="mdpNow" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="newMdp">Nouveau mot de passe</label>
                        <input type="password" id="newMdp" name="newMdp" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="newMdp2">Confirmation du nouveau mot de passe</label>
                        <input type="password" id="newMdp2" name="newMdp2" class="form-control" required>
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