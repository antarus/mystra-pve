<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class Users extends \Core\Model\AbstractModel
{

    /**
     * Colonne: idUsers
     *
     * @var int
     */
    public $id = null;
    
    /**
     * Colonne: idUsers
     *
     * @var int
     */
    public $username = null;

    /**
     * Colonne: login
     *
     * @var string
     */
    public $email = null;

    /**
     * Colonne: pwd
     *
     * @var string
     */
    public $display_name = null;

    /**
     * Colonne: pseudo
     *
     * @var string
     */
    public $password = null;

    /**
     * Colonne: email
     *
     * @var string
     */
    public $state = null;

    /**
     * Colonne: avatar
     *
     * @var string
     */
    public $lastConnection = null;

    /**
     * Colonne: admin
     *
     * @var int
     */
    public $lastUpdate = null;

    /**
     * Colonne: forgetPass
     *
     * @var string
     */
    public $keyValidMail = null;
    
    /**
     * Colonne: forgetPass
     *
     * @var string
     */
    public $forgetpass = null;

    /**
     * Surcharge cette methode dans la classe enfant si vous avez besoin évenenement
     * pre insertion.
     *
     * @param EventManagerInterface
     */
    public function preInsert(EventManagerInterface $oEventManager)
    {
    }

    /**
     * Surcharge cette methode dans la classe enfant si vous avez besoin évenenement
     * post insertion.
     *
     * @param EventManagerInterface
     */
    public function postInsert(EventManagerInterface $oEventManager)
    {
    }

    /**
     * Surcharge cette methode dans la classe enfant si vous avez besoin évenenement
     * pre mise à jour.
     *
     * @param EventManagerInterface
     */
    public function preUpdate(EventManagerInterface $oEventManager)
    {
    }

    /**
     * Surcharge cette methode dans la classe enfant si vous avez besoin évenenement
     * post mise à jour.
     *
     * @param EventManagerInterface
     */
    public function postUpdate(EventManagerInterface $oEventManager)
    {
    }

    /**
     * Surcharge cette methode dans la classe enfant si vous avez besoin évenenement
     * pre suppression.
     *
     * @param EventManagerInterface
     */
    public function preDelete(EventManagerInterface $oEventManager)
    {
    }

    /**
     * Surcharge cette methode dans la classe enfant si vous avez besoin évenenement
     * post suppression.
     *
     * @param EventManagerInterface
     */
    public function postDelete(EventManagerInterface $oEventManager)
    {
    }

    /**
     * Retourne la valeur idUsers.
     *
     * @return int
     */
    public function getIdUsers()
    {
        return intval($this->id);
    }

    /**
     * Définit la valeur pour idUsers
     *
     * @param int
     */
    public function setIdUsers($value)
    {
        $this->id = $value;
    }

    /**
     * Retourne la valeur login.
     *
     * @return string
     */
    public function getUsername()
    {
        return strval($this->username);
    }

    /**
     * Définit la valeur pour login
     *
     * @param string
     */
    public function setUsername($value)
    {
        $this->username = $value;
    }

    /**
     * Retourne la valeur pwd.
     *
     * @return string
     */
    public function getPassword()
    {
        return strval($this->password);
    }

    /**
     * Définit la valeur pour pwd
     *
     * @param string
     */
    public function setPassword($value)
    {
        $this->password = $value;
    }

    /**
     * Retourne la valeur pseudo.
     *
     * @return string
     */
    public function getDisplayName()
    {
        return strval($this->display_name);
    }

    /**
     * Définit la valeur pour pseudo
     *
     * @param string
     */
    public function setDisplayName($value)
    {
        $this->display_name = $value;
    }

    /**
     * Retourne la valeur email.
     *
     * @return string
     */
    public function getEmail()
    {
        return strval($this->email);
    }

    /**
     * Définit la valeur pour email
     *
     * @param string
     */
    public function setEmail($value)
    {
        $this->email = $value;
    }

    /**
     * Retourne la valeur avatar.
     *
     * @return string
     */
    public function getstate()
    {
        return strval($this->state);
    }

    /**
     * Définit la valeur pour avatar
     *
     * @param string
     */
    public function setstate($value)
    {
        $this->state = $value;
    }

    /**
     * Retourne la valeur admin.
     *
     * @return int
     */
    public function getlastConnection()
    {
        return intval($this->lastConnection);
    }

    /**
     * Définit la valeur pour admin
     *
     * @param int
     */
    public function setlastConnection($value)
    {
        $this->lastConnection = $value;
    }

    /**
     * Retourne la valeur forgetPass.
     *
     * @return string
     */
    public function getLastUpdate()
    {
        return strval($this->lastUpdate);
    }

    /**
     * Définit la valeur pour forgetPass
     *
     * @param string
     */
    public function setLastUpdate($value)
    {
        $this->lastUpdate = $value;
    }
    
     /**
     * Retourne la valeur forgetPass.
     *
     * @return string
     */
    public function getKeyValidMail()
    {
        return strval($this->keyValidMail);
    }

    /**
     * Définit la valeur pour forgetPass
     *
     * @param string
     */
    public function setKeyValidMail($value)
    {
        $this->keyValidMail = $value;
    }
    
     /**
     * Retourne la valeur forgetPass.
     *
     * @return string
     */
    public function getKeyForgetpass()
    {
        return strval($this->forgetpass);
    }

    /**
     * Définit la valeur pour forgetPass
     *
     * @param string
     */
    public function setForgetpass($value)
    {
        $this->forgetpass = $value;
    }

}

