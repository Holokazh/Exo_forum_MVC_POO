<?php

namespace Controller;

use App\Session;
use App\Router;
use Model\Manager\UtilisateurManager;
use Model\Manager\TopicManager;
use model\entity\Utilisateur;

class SecurityController
{

    public function index()
    {
        Router::redirectTo("home", "index");
    }


    /*** Redirection vers la page d'inscription ***/
    public function registerPage()
    {
        return [
            "view" => "security/register.php",
            "data" => null,
            "titrePage" => "FORUM | Inscription"
        ];
    }

    /*** Inscription ***/
    public function register()
    {
        // var_dump($_POST);
        foreach ($_POST as $key => $value) {
            if (!empty($value)) {
                ${$key} = $value;
            } else {
                echo "ERREUR";
            }
        }

        // Filtrage des données et vérification du pseudonyme
        $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_STRING);


        // Filtrage des données et vérification de l'EMAIL
        $email = strtolower(filter_var($email, FILTER_VALIDATE_EMAIL));

        // On vérifie si l'utilisateur existe déjà
        $utilisateurManager = new UtilisateurManager();
        if ($utilisateurManager->findByEmail($email)) {
            var_dump($utilisateurManager->findByEmail($email));
            die;
        }
        if ($utilisateurManager->findByPseudo($pseudo)) {
            var_dump($utilisateurManager->findByPseudo($pseudo));
            die;
        }

        if (!$email) {
            var_dump($email);
            die;
        }

        // On vérifie si le mot de passe correspond à la confirmation du mot de passe
        // Puis si le mot de passe ne dépasse pas 20 caractères
        if ($mdp !== $mdp2 && strlen($mdp >= 20)) {
            var_dump($mdp, $mdp2);
            die;
        }

        $mdp = password_hash($mdp, PASSWORD_BCRYPT);

        $params = [
            ":pseudo" => $pseudo,
            ":mdp" => $mdp,
            ":email" => $email
        ];

        if ($utilisateurManager->addUser($params)) {
            $message = "SUCCES !";
        } else {
            $message = "ERREUR !";
        }

        return [
            "view" => "security/register.php",
            "data" => [
                "message" => $message
            ],
            "titrePage" => "FORUM | Inscription"
        ];
    }


    /*** Redirection vers la page de connexion ***/
    public function loginPage()
    {
        return [
            "view" => "security/login.php",
            "data" => null,
            "titrePage" => "FORUM | Connexion"
        ];
    }

    /*** Connexion ***/
    public function login()
    {
        if (!empty($_POST)) {
            $username = filter_input(INPUT_POST, "pseudo");
            $password = filter_input(INPUT_POST, "mdp");

            $model = new UtilisateurManager();
            if ($user = $model->findUser($username)) {

                if (password_verify($password, $user->getMotDePasse())) {
                    Session::setUser($user);
                    Router::redirectTo("home");
                } else var_dump("MAUVAIS MOT DE PASSE");
            } else var_dump("UTILISATEUR INCONNU");
        }

        return [
            "view" => "security/login.php",
            "data" => null
        ];
    }


    /*** Redirection vers le profil ***/
    public function detailUser()
    {
        return [
            "view" => "security/profil.php",
            "titrePage" => "FORUM | Profil"
        ];
    }


    /*** Déconnexion ***/
    public function logout()
    {
        Session::removeUser();
        Router::redirectTo("home");
    }


    /*** Changement de pseudo ***/

    /*** Redirection vers le formulaire ***/
    public function changePseudoPage()
    {
        return [
            "view" => "security/changePseudoForm.php",
            "titrePage" => "FORUM | Changement de pseudo"
        ];
    }

    /*** Méthode pour l'action du formulaire ***/
    public function changePseudo()
    {
        if (!empty($_POST)) {
            $id = (isset($_GET['id'])) ? $_GET['id'] : null;
            $pseudoNow = filter_input(INPUT_POST, "pseudoNow");
            $pseudo = filter_input(INPUT_POST, "newPseudo");
            $pseudo2 = filter_input(INPUT_POST, "newPseudo2");

            $userManager = new UtilisateurManager();

            if ($userManager->findByPseudo($pseudo)) {
                var_dump($userManager->findByPseudo($pseudo));
                die;
            }

            if ($pseudoNow == Session::getUser()->getPseudonyme()) {
                if ($pseudo == $pseudo2) {
                    $userManager->changePseudo($id, $pseudo);
                } else var_dump("La confirmation du pseudo n'est pas le même que celui que vous avez entré");
            } else var_dump("Votre pseudo actuel n'est pas celui que vous avez entré");
        }

        $user = $userManager->findUser($pseudo);
        Session::setUser($user);

        return [
            "view" => "security/profil.php"
        ];
    }


    /*** Changement de l'adresse mail ***/

    /*** Redirection vers le formulaire ***/
    public function changeEmailPage()
    {
        return [
            "view" => "security/changeEmailForm.php",
            "titrePage" => "FORUM | Changement de l'email"
        ];
    }

    public function changeEmail()
    {
        if (!empty($_POST)) {
            $id = (isset($_GET['id'])) ? $_GET['id'] : null;
            $emailNow = filter_input(INPUT_POST, "emailNow");
            $newEmail = filter_input(INPUT_POST, "newEmail");
            $newEmail2 = filter_input(INPUT_POST, "newEmail2");

            $emailNow = strtolower(filter_var($emailNow, FILTER_VALIDATE_EMAIL));
            $newEmail = strtolower(filter_var($newEmail, FILTER_VALIDATE_EMAIL));
            $newEmail2 = strtolower(filter_var($newEmail2, FILTER_VALIDATE_EMAIL));

            $userManager = new UtilisateurManager();

            if ($userManager->findByEmail($newEmail)) {
                var_dump($userManager->findByEmail($newEmail));
                die;
            }

            if ($emailNow == Session::getUser()->getEmailUtilisateur()) {
                if (!empty($newEmail)) {
                    if ($newEmail == $newEmail2) {
                        $userManager->changeEmail($id, $newEmail);
                    } else var_dump("La confirmation de l'adresse email n'est pas la même que celle que vous avez entré");
                } else var_dump("L'adresse email n'est pas valide");
            } else var_dump("Votre adresse email actuelle n'est pas celle que vous avez entré", $emailNow, Session::getUser()->getEmailUtilisateur());
        }

        $user = $userManager->findEmail($newEmail);
        Session::setUser($user);

        return [
            "view" => "security/profil.php"
        ];
    }


    /*** Changement du mot de passe ***/

    /*** Redirection vers le formulaire ***/
    public function changePasswordPage()
    {
        return [
            "view" => "security/changePasswordForm.php",
            "titrePage" => "FORUM | Changement de mot de passe"
        ];
    }

    /*** Méthode pour l'action du formulaire ***/
    public function changePassword()
    {
        if (!empty($_POST)) {
            $id = (isset($_GET['id'])) ? $_GET['id'] : null;
            $mdpNow = filter_input(INPUT_POST, "mdpNow");
            $newMdp = filter_input(INPUT_POST, "newMdp");
            $newMdp2 = filter_input(INPUT_POST, "newMdp2");

            $userManager = new UtilisateurManager();

            if (password_verify($mdpNow, Session::getUser()->getMotDePasse())) {
                if ($newMdp == $newMdp2) {
                    $newMdp = password_hash($newMdp, PASSWORD_BCRYPT);
                    $userManager->changePassword($id, $newMdp);
                } else var_dump("La confirmation du mot de passe n'est pas le même que celui que vous avez entré");
            } else var_dump("Votre mot de passe actuel n'est pas celui que vous avez entré");
        }

        $user = $userManager->findPassword($newMdp);
        Session::setUser($user);

        return [
            "view" => "security/profil.php"
        ];
    }

    public function searchTopic()
    {
        $topManager = new TopicManager();

        // var_dump($_POST['search']);
        // die;

        if (isset($_POST['search']) and !empty($_POST['search'])) {
            $search = htmlspecialchars($_POST['search']);
            $research = $topManager->searchTopic($search);
        }

        // var_dump($_POST['search']);
        // die;

        return [
            "view" => "security/searchTopics.php",
            "data" => ["topics" => $research],
            "titrePage" => "FORUM | Recherche"
        ];
    }
}
