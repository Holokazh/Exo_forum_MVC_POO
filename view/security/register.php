<div class="backgroundRegister">
    <div class="pageLogin">
        <div class="whiteTransLogin">
            <div class="contentWhiteTrans">
                <div class="titlePageLogin flex">
                    <h2 class="h2PageLogin">Créez votre compte</h2>
                </div>
                <form action="?ctrl=security&method=register" method="POST" class="formLogin flex">
                    <div class="form-group">
                        <label for="username">Nom de compte *</label>
                        <input type="text" id="username" name="pseudo" placeholder="Entrez votre nom de compte" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe *</label>
                        <input type="password" id="password" name="mdp" placeholder="Entrez votre mot de passe" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Confirmation du mot de passe *</label>
                        <input type="password" id="password" name="mdp2" placeholder="Entrez votre mot de passe" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Adresse mail *</label>
                        <input type="email" id="email" name="email" placeholder="Entrez votre adresse mail" class="form-control" required>
                    </div>

                    <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                    <button type="submit" class="btn btn-primary">Inscription</button>

                    <p>Vous possédez déjà un compte ?
                        <a href="?ctrl=security&method=loginPage">Connectez-vous !</a>
                    </p>
            </div>
        </div>
    </div>
</div>