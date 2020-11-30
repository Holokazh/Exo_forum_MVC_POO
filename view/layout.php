<?php
App\Session::getUser();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= CSS_PATH ?>style.css">
    <title><?= $result['titrePage']; ?></title>
</head>

<body>

    <header>
        <div class="headerTopBackground">
            <div class="wrapper flex headerTop">
                <a href="?ctrl=home&method=index"><img id="logoDofusHome" src="<?= IMG_PATH ?>logoDofusWrite.png"></a>

                <div class="flex headerTopUser">
                    <?php if (empty($_SESSION['user'])) { ?>
                        <a href="?ctrl=security&method=loginPage">Connexion <img id="logoUserConnexion" src="<?= IMG_PATH ?>logoUserConnexion.png"></a>
                        <a href="?ctrl=security&method=registerPage">Inscription</a>
                    <?php } else { ?>
                        <a href="?ctrl=security&method=detailUser&id=<?= App\Session::getUser()->getId(); ?>"><?= App\Session::getUser()->getPseudonyme(); ?><img id="logoUserConnexion" src="<?= IMG_PATH ?>logoUserConnexion.png"></a>
                        <a href="?ctrl=security&method=logout">Deconnexion</a>
                    <?php } ?>
                </div>
            </div>
        </div>

        <nav>
            <div class="flex wrapper headerBot">

                <!-- <a href="?ctrl=security&method=logout">Déconnexion</a> -->
                <div class="flex headerBotLeft">
                    <a href="?ctrl=forum&method=listCategories">Categories</a>
                    <a href="?ctrl=forum&method=listMessages">Activités récentes</a>
                </div>
                <img id="logoDofusNav" src="<?= IMG_PATH ?>logoDofusNav.png">
                <div class="flex headerBotRight">
                    <a href="?ctrl=forum&method=listTopics">Liste des topics</a>
                    <a href="?ctrl=forum&method=addTopicPage">Créer un topic </a>
                </div>

            </div>
        </nav>
    </header>

    <main>
        <?= $page ?>
    </main>

    <footer>
        <section class="sFooter flex">
            <img src="<?= IMG_PATH ?>logoAnkama.png">
            <small>© 2020 Ankama. Tous droits réservés. <a href="#">Conditions d'utilisation</a> - <a href="#">Politique de confidentialité</a> - <a href="#">Conditions Générales de Vente</a> - <a href="#">Mentions Légales</a> - <a href="#">Gestion des cookies</a></small>
        </section>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>