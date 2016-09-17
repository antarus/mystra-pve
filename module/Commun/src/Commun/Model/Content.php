<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Capi
 * @project Raid-TracKer
 */
class Content extends \Core\Model\AbstractModel {

    /**
     * Colonne: idContent
     *
     * @var int
     */
    public $idContent = null;

    /**
     * Colonne: type
     *
     * @var enum
     */
    public $type = null;

    /**
     * Colonne: idPages
     *
     * @var int
     */
    public $idPages = null;

    /**
     * Colonne: content
     *
     * @var text
     */
    public $content = null;
    
    /**
     * Colonne: titleArticle
     *
     * @var string
     */
    public $titleArticle = null;
    
    /**
     * Colonne: writeby
     *
     * @var int
     */
    public $writeBy = null;

    /**
     * Colonne: updateBy  
     *
     * @var int
     */
    public $updateBy = null;
    
    /**
     * Colonne: lastUpdate  
     *
     * @var timestamp
     */
    public $lastUpdate = null;

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

    public function getIdContent() {
        return $this->idContent;
    }

    public function getType() {
        return $this->type;
    }

    public function getIdPages() {
        return $this->idPages;
    }

    public function getContent() {
        return $this->content;
    }

    public function getWriteBy() {
        return $this->writeBy;
    }

    public function getUpdateBy() {
        return $this->updateBy;
    }

    public function getLastUpdate() {
        return $this->lastUpdate;
    }
    
    public function getTitleArticle(){
        return $this->titleArticle;
    }
    
    public function setTitleArticle($titleArticle)
    {
        $this->titleArticle = $titleArticle;
    }
    
    public function setIdContent($idContent) {
        $this->idContent = $idContent;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setIdPages($idPages) {
        $this->idPages = $idPages;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setWriteBy($writeBy) {
        $this->writeBy = $writeBy;
    }

    public function setUpdateBy($updateBy) {
        $this->updateBy = $updateBy;
    }

    public function setLastUpdate($lastUpdate) {
        $this->lastUpdate = $lastUpdate;
    }


}
