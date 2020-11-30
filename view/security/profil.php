<div class="backgroundAccueil">
    <div class="page">
        <div class="whiteTrans">
            <div class="contentWhiteTrans">
                <section class="sUpCategories flex">
                    <div class="col-sm-12 titlePage flex">
                        <h2 class="h2Page">Bonjour <?= app\Session::getUser() ?></h2>
                    </div>
                </section>

                <div>
                    <p>Pseudo <?= app\Session::getUser() . " " ?><a href="?ctrl=security&method=changePseudoPage&id=<?= app\Session::getUser()->getId() ?>"> Modifier</a></p>
                    <p>Adresse email <?= app\Session::getUser()->getEmailUtilisateur() ?><a href="?ctrl=security&method=changeEmailPage&id=<?= app\Session::getUser()->getId() ?>"> Modifier</a></p>
                    <p><a href="?ctrl=security&method=changePasswordPage&id=<?= app\Session::getUser()->getId() . " " ?>">Changer mon mot de passe</a></p>
                    <p>Membre depuis le <?= app\Session::getUser()->getDateCreationUtilisateur(); ?></p>
                </div>

            </div>
        </div>
    </div>
</div>