<?php

namespace Model\Manager;

use App\AbstractManager;

class TopicManager extends AbstractManager
{
    private static $classname = "Model\Entity\Topic";

    public function __construct()
    {
        self::connect(self::$classname);
    }

    public function findAll()
    {

        $sql = "SELECT *
                    FROM topic
                    ORDER BY dateCreationTopic DESC";

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
                        FROM topic 
                        WHERE id_topic = :id";
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
        FROM topic
        WHERE categorie_id = :id";
        return self::getResults(
            self::select(
                $sql,
                ["id" => $id],
                true
            ),
            self::$classname
        );
    }

    public function addTopic($array)
    {
        $sql = "INSERT INTO topic (titreTopic, dateCreationTopic, textTopic, utilisateur_id, categorie_id)
        VALUES (:titreTopic, NOW(), :textTopic, :utilisateur_id, :categorie_id)";
        return self::create(
            $sql,
            $array
        );
        self::$classname;
    }

    public function deleteMessFromTopic($id)
    {
        $sql = "DELETE FROM message WHERE topic_id = :id";
        return self::delete(
            $sql,
            ["id" => $id]
        );
        self::$classname;
    }

    public function deleteTopic($id)
    {
        $sql = "DELETE FROM topic WHERE id_topic = :id";
        return self::delete(
            $sql,
            ["id" => $id]
        );
        self::$classname;
    }

    public function searchTopic($search)
    {
        $sql = "SELECT *
        FROM topic
        WHERE titreTopic LIKE '%$search%'
        ORDER BY dateCreationTopic DESC";

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
