<?php

namespace Commun\Model;

use Zend\EventManager\EventManagerInterface;

/**
 * @author Antarus
 * @project Mystra
 */
class Users extends \Core\Model\AbstractModel
{

    /**
     * Colonne: idUsers
     *
     * @var int
     */
    public $idUsers = null;

    /**
     * Colonne: login
     *
     * @var string
     */
    public $login = null;

    /**
     * Colonne: pwd
     *
     * @var string
     */
    public $pwd = null;

    /**
     * Colonne: pseudo
     *
     * @var string
     */
    public $pseudo = null;

    /**
     * Colonne: email
     *
     * @var string
     */
    public $email = null;

    /**
     * Colonne: avatar
     *
     * @var string
     */
    public $avatar = null;

    /**
     * Colonne: admin
     *
     * @var int
     */
    public $admin = null;

    /**
     * Colonne: forgetPass
     *
     * @var string
     */
    public $forgetPass = null;

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
        return intval($this->idUsers);
    }

    /**
     * Définit la valeur pour idUsers
     *
     * @param int
     */
    public function setIdUsers($value)
    {
        $this->idUsers = $value;
    }

    /**
     * Retourne la valeur login.
     *
     * @return string
     */
    public function getLogin()
    {
        return strval($this->login);
    }

    /**
     * Définit la valeur pour login
     *
     * @param string
     */
    public function setLogin($value)
    {
        $this->login = $value;
    }

    /**
     * Retourne la valeur pwd.
     *
     * @return string
     */
    public function getPwd()
    {
        return strval($this->pwd);
    }

    /**
     * Définit la valeur pour pwd
     *
     * @param string
     */
    public function setPwd($value)
    {
        $this->pwd = $value;
    }

    /**
     * Retourne la valeur pseudo.
     *
     * @return string
     */
    public function getPseudo()
    {
        return strval($this->pseudo);
    }

    /**
     * Définit la valeur pour pseudo
     *
     * @param string
     */
    public function setPseudo($value)
    {
        $this->pseudo = $value;
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
    public function getAvatar()
    {
        return strval($this->avatar);
    }

    /**
     * Définit la valeur pour avatar
     *
     * @param string
     */
    public function setAvatar($value)
    {
        $this->avatar = $value;
    }

    /**
     * Retourne la valeur admin.
     *
     * @return int
     */
    public function getAdmin()
    {
        return intval($this->admin);
    }

    /**
     * Définit la valeur pour admin
     *
     * @param int
     */
    public function setAdmin($value)
    {
        $this->admin = $value;
    }

    /**
     * Retourne la valeur forgetPass.
     *
     * @return string
     */
    public function getForgetPass()
    {
        return strval($this->forgetPass);
    }

    /**
     * Définit la valeur pour forgetPass
     *
     * @param string
     */
    public function setForgetPass($value)
    {
        $this->forgetPass = $value;
    }


}

