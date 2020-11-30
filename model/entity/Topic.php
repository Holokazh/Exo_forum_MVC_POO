<?php

namespace model\entity;

use App\AbstractEntity;

class Topic extends AbstractEntity
{

    private $id;
    private $titreTopic;
    private $dateCreationTopic;
    private $textTopic;
    private $statut;
    private $utilisateur;
    private $categorie;

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
     * Get the value of titreTopic
     */
    public function getTitreTopic()
    {
        return $this->titreTopic;
    }

    /**
     * Set the value of titreTopic
     *
     * @return  self
     */
    public function setTitreTopic($titreTopic)
    {
        $this->titreTopic = $titreTopic;

        return $this;
    }

    /**
     * Get the value of dateCreationTopic
     */
    public function getDateCreationTopic()
    {
        return $this->dateCreationTopic;
    }

    /**
     * Set the value of dateCreationTopic
     *
     * @return  self
     */
    public function setDateCreationTopic($dateCreationTopic)
    {
        $this->dateCreationTopic = $dateCreationTopic;

        return $this;
    }

    /**
     * Get the value of textTopic
     */
    public function getTextTopic()
    {
        return $this->textTopic;
    }

    /**
     * Set the value of textTopic
     *
     * @return  self
     */
    public function setTextTopic($textTopic)
    {
        $this->textTopic = $textTopic;

        return $this;
    }

    /**
     * Get the value of statut
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     *
     * @return  self
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get the value of categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set the value of categorie
     *
     * @return  self
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function __toString()
    {
        return $this->titreTopic;
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
}
