<?php

// var_dump($csrf_token);
?>
<div class="backgroundLogin">
    <div class="pageLogin">
        <div class="whiteTransLogin">
            <div class="contentWhiteTrans">
                <div class="titlePageLogin flex">
                    <h2 class="h2PageLogin">Connexion</h2>
                </div>
                <form action="?ctrl=security&method=login" class="formLogin flex" method="POST">
                    <div class="form-group">
                        <label for="username">Nom de compte *</label>
                        <input type="text" id="username" name="pseudo" placeholder="Entrez votre nom de compte" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe *</label>
                        <input type="password" id="password" name="mdp" placeholder="Entrez votre mot de passe" class="form-control" required>
                    </div>

                    <input type="hidden" name="csrf_token" value="<?= $csrf_token; ?>">

                    <button type="submit" class="btn btn-primary">Se connecter</button>
                    <p><a href="#">Identifiants perdus ?</a></p>

                    <p>Vous n'avez pas de compte ?
                        <a href="?ctrl=security&method=registerPage">Inscrivez-vous !</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>