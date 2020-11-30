<?php

namespace model\entity;

use App\AbstractEntity;

class Message extends AbstractEntity
{

    private $id;
    private $textMessage;
    private $dateCreationMessage;
    private $utilisateur;
    private $topic;

    public function __construct($data)
    {
        parent::hydrate($data);
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of textMessage
     */
    public function getTextMessage()
    {
        return $this->textMessage;
    }

    /**
     * Set the value of textMessage
     *
     * @return  self
     */
    public function setTextMessage($textMessage)
    {
        $this->textMessage = $textMessage;

        return $this;
    }

    /**
     * Get the value of dateCreationMessage
     */
    public function getDateCreationMessage()
    {
        return $this->dateCreationMessage;
    }

    /**
     * Set the value of dateCreationMessage
     *
     * @return  self
     */
    public function setDateCreationMessage($dateCreationMessage)
    {
        $this->dateCreationMessage = $dateCreationMessage;

        return $this;
    }

    /**
     * Get the value of utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set the value of utilisateur
     *
     * @return  self
     */
    public function setUtilisateur($utilisateur)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get the value of topic
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Set the value of topic
     *
     * @return  self
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;

        return $this;
    }

    public function __toString()
    {
        return $this->textMessage;
    }
}
