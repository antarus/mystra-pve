<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Antarus
 * @project Mystra
 */
class Items extends \Core\Model\AbstractModel {

    /**
     * Colonne: idItem
     *
     * @var int
     */
    public $idItem = null;

    /**
     * Colonne: nom
     *
     * @var string
     */
    public $nom = null;

    /**
     * Colonne: ajouterPar
     *
     * @var string
     */
    public $ajouterPar = null;

    /**
     * Colonne: majPar
     *
     * @var string
     */
    public $majPar = null;

    /**
     * Colonne: idItemJeu
     *
     * @var string
     */
    public $idBnet = null;

    /**
     * Colonne: couleur
     *
     * @var string
     */
    public $couleur = null;

    /**
     * Colonne: icon
     *
     * @var string
     */
    public $icon = null;

    /**
     * Surcharge cette methode dans la classe enfant si vous avez besoin évenenement
     * pre insertion.
     *
     * @param EventManagerInterface
     */
    public function preInsert(EventManagerInterface $oEventManager) {

    }

    /**
     * Surcharge cette methode dans la classe enfant si vous avez besoin évenenement
     * post insertion.
     *
     * @param EventManagerInterface
     */
    public function postInsert(EventManagerInterface $oEventManager) {

    }

    /**
     * Surcharge cette methode dans la classe enfant si vous avez besoin évenenement
     * pre mise à jour.
     *
     * @param EventManagerInterface
     */
    public function preUpdate(EventManagerInterface $oEventManager) {

    }

    /**
     * Surcharge cette methode dans la classe enfant si vous avez besoin évenenement
     * post mise à jour.
     *
     * @param EventManagerInterface
     */
    public function postUpdate(EventManagerInterface $oEventManager) {

    }

    /**
     * Surcharge cette methode dans la classe enfant si vous avez besoin évenenement
     * pre suppression.
     *
     * @param EventManagerInterface
     */
    public function preDelete(EventManagerInterface $oEventManager) {

    }

    /**
     * Surcharge cette methode dans la classe enfant si vous avez besoin évenenement
     * post suppression.
     *
     * @param EventManagerInterface
     */
    public function postDelete(EventManagerInterface $oEventManager) {

    }

    /**
     * Retourne la valeur idItem.
     *
     * @return int
     */
    public function getIdItem() {
        return intval($this->idItem);
    }

    /**
     * Définit la valeur pour idItem
     *
     * @param int
     */
    public function setIdItem($value) {
        $this->idItem = $value;
    }

    /**
     * Retourne la valeur nom.
     *
     * @return string
     */
    public function getNom() {
        return strval($this->nom);
    }

    /**
     * Définit la valeur pour nom
     *
     * @param string
     */
    public function setNom($value) {
        $this->nom = $value;
    }

    /**
     * Retourne la valeur ajouterPar.
     *
     * @return string
     */
    public function getAjouterPar() {
        return strval($this->ajouterPar);
    }

    /**
     * Définit la valeur pour ajouterPar
     *
     * @param string
     */
    public function setAjouterPar($value) {
        $this->ajouterPar = $value;
    }

    /**
     * Retourne la valeur majPar.
     *
     * @return string
     */
    public function getMajPar() {
        return strval($this->majPar);
    }

    /**
     * Définit la valeur pour majPar
     *
     * @param string
     */
    public function setMajPar($value) {
        $this->majPar = $value;
    }

    /**
     * Retourne la valeur idBnet.
     *
     * @return int
     */
    public function getIdBnet() {
        return intval($this->idBnet);
    }

    /**
     * Définit la valeur pour idItemJeu
     *
     * @param int
     */
    public function setIdBnet($value) {
        $this->idBnet = $value;
    }

    /**
     * Retourne la valeur couleur.
     *
     * @return string
     */
    public function getCouleur() {
        return strval($this->couleur);
    }

    /**
     * Définit la valeur pour couleur
     *
     * @param string
     */
    public function setCouleur($value) {
        $this->couleur = $value;
    }

    /**
     * Retourne la valeur pour l'icone.
     *
     * @return string
     */
    public function getIcon() {
        return strval($this->icon);
    }

    /**
     * Définit la valeur pour l'icone
     *
     * @param string
     */
    public function setIcon($value) {
        $this->icon = $value;
    }

}
