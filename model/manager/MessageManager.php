<?php

namespace Model\Manager;

use App\AbstractManager;

class MessageManager extends AbstractManager
{
    private static $classname = "Model\Entity\Message";

    public function __construct()
    {
        self::connect(self::$classname);
    }

    public function findAll()
    {

        $sql = "SELECT *
        FROM message m, utilisateur u
        WHERE m.utilisateur_id = u.id_utilisateur
                    ORDER BY dateCreationMessage DESC";

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
                        FROM message
                        WHERE id_message = :id";
        return self::getOneOrNullResult(
            self::select(
                $sql,
                ["id" => $id],
                false
            ),
            self::$classname
        );
    }

    public function findById($id)
    {
        $sql = "SELECT *
        FROM message
        WHERE topic_id = :id";
        return self::getResults(
            self::select(
                $sql,
                ["id" => $id],
                true
            ),
            self::$classname
        );
    }

    public function lastMessages()
    {

        $sql = "SELECT *
        FROM message m
        INNER JOIN utilisateur u
        ON u.id_utilisateur = m.utilisateur_id
        INNER JOIN topic t
        ON t.id_topic = m.topic_id";

        return self::getResults(
            self::select(
                $sql,
                null,
                true
            ),
            self::$classname
        );
    }
}
