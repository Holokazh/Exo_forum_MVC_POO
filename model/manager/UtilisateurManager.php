<?php

namespace Model\Manager;

use App\AbstractManager;
use model\entity\Utilisateur;

class UtilisateurManager extends AbstractManager
{
    private static $classname = "Model\Entity\Utilisateur";

    public function __construct()
    {
        self::connect(self::$classname);
    }

    public function findAll()
    {

        $sql = "SELECT *, DATE_FORMAT(dateCreationUtilisateur, '%e/%m/%Y') AS dateCreationUser
                    FROM utilisateur
                    ORDER BY dateCreationUtilisateur DESC";

        return self::getResults(
            self::select(
                $sql,
                null,
                true
            ),
            self::$classname
        );
    }

    public function findOneById($id)
    {
        $sql = "SELECT * 
                        FROM utilisateur
                        WHERE id_utilisateur = :id";
        return self::getOneOrNullResult(
            self::select(
                $sql,
                ["id" => $id],
                false
            ),
            self::$classname
        );
    }

    public function addUser($array)
    {
        $sql = "INSERT INTO utilisateur(pseudonyme, motDePasse, emailUtilisateur) 
        VALUES (:pseudo, :mdp, :email)";
        return self::create(
            $sql,
            $array
        );
        self::$classname;
    }

    public function findUser($username)
    {

        $sql = "SELECT * FROM utilisateur WHERE pseudonyme = :pseudonyme";

        return self::getOneOrNullResult(
            self::select($sql, ['pseudonyme' => $username], false),
            self::$classname
        );
    }

    public function findByEmail($email)
    {
        $sql = "SELECT emailUtilisateur
        FROM utilisateur
        WHERE emailUtilisateur = :email";

        return self::getOneOrNullResult(
            self::select(
                $sql,
                ['email' => $email],
                false
            ),
            self::$classname
        );
    }

    public function findByPseudo($pseudo)
    {
        $sql = "SELECT pseudonyme
        FROM utilisateur
        WHERE pseudonyme = :pseudo";

        return self::getOneOrNullResult(
            self::select(
                $sql,
                ['pseudo' => $pseudo],
                false
            ),
            self::$classname
        );
    }

    public function changePseudo($id, $pseudo)
    {
        $sql = "UPDATE utilisateur
        SET pseudonyme = :pseudo
        WHERE id_utilisateur = :id";

        return self::update(
            $sql,
            [
                'id' => $id,
                'pseudo' => $pseudo
            ]
        );
    }

    public function findPassword($password)
    {

        $sql = "SELECT * FROM utilisateur WHERE motDePasse = :password";

        return self::getOneOrNullResult(
            self::select($sql, ['password' => $password], false),
            self::$classname
        );
    }

    public function changePassword($id, $password)
    {
        $sql = "UPDATE utilisateur
        SET motDePasse = :password
        WHERE id_utilisateur = :id";

        return self::update(
            $sql,
            [
                'id' => $id,
                'password' => $password
            ]
        );
    }


    public function findEmail($email)
    {

        $sql = "SELECT * FROM utilisateur WHERE emailUtilisateur = :email";

        return self::getOneOrNullResult(
            self::select($sql, ['email' => $email], false),
            self::$classname
        );
    }

    public function changeEmail($id, $email)
    {
        $sql = "UPDATE utilisateur
        SET emailUtilisateur = :email
        WHERE id_utilisateur = :id";

        return self::update(
            $sql,
            [
                'id' => $id,
                'email' => $email
            ]
        );
    }
}
