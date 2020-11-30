<?php

namespace model\entity;

use App\AbstractEntity;

class Utilisateur extends AbstractEntity
{

    private $id;
    private $pseudonyme;
    private $motDePasse;
    private $emailUtilisateur;
    private $imgUtilisateur;
    private $roleUtilisateur;
    private $dateCreationUtilisateur;
    private $dateCreationUser;

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
     * Get the value of pseudonyme
     */
    public function getPseudonyme()
    {
        return $this->pseudonyme;
    }

    /**
     * Set the value of pseudonyme
     *
     * @return  self
     */
    public function setPseudonyme($pseudonyme)
    {
        $this->pseudonyme = $pseudonyme;

        return $this;
    }

    /**
     * Get the value of motDePasse
     */
    public function getMotDePasse()
    {
        return $this->motDePasse;
    }

    /**
     * Set the value of motDePasse
     *
     * @return  self
     */
    public function setMotDePasse($motDePasse)
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    /**
     * Get the value of emailUtilisateur
     */
    public function getEmailUtilisateur()
    {
        return $this->emailUtilisateur;
    }

    /**
     * Set the value of emailUtilisateur
     *
     * @return  self
     */
    public function setEmailUtilisateur($emailUtilisateur)
    {
        $this->emailUtilisateur = $emailUtilisateur;

        return $this;
    }

    /**
     * Get the value of imgUtilisateur
     */
    public function getImgUtilisateur()
    {
        return $this->imgUtilisateur;
    }

    /**
     * Set the value of imgUtilisateur
     *
     * @return  self
     */
    public function setImgUtilisateur($imgUtilisateur)
    {
        $this->imgUtilisateur = $imgUtilisateur;

        return $this;
    }

    /**
     * Get the value of roleUtilisateur
     */
    public function getRoleUtilisateur()
    {
        return $this->roleUtilisateur;
    }

    /**
     * Set the value of roleUtilisateur
     *
     * @return  self
     */
    public function setRoleUtilisateur($roleUtilisateur)
    {
        $this->roleUtilisateur = $roleUtilisateur;

        return $this;
    }

    /**
     * Get the value of dateCreationUtilisateur
     */
    public function getDateCreationUtilisateur()
    {
        return $this->dateCreationUtilisateur;
    }

    /**
     * Set the value of dateCreationUtilisateur
     *
     * @return  self
     */
    public function setDateCreationUtilisateur($dateCreationUtilisateur)
    {
        $this->dateCreationUtilisateur = $dateCreationUtilisateur;

        return $this;
    }

    /**
     * Get the value of dateCreationUser
     */
    public function getDateCreationUser()
    {
        return $this->dateCreationUser;
    }

    /**
     * Set the value of dateCreationUser
     *
     * @return  self
     */
    public function setDateCreationUser($dateCreationUser)
    {
        $this->dateCreationUser = $dateCreationUser;

        return $this;
    }

    public function __toString()
    {
        return $this->pseudonyme;
    }
}
