<?php

namespace Commun\Table;

use Zend\Db\Sql\Expression;
use \Commun\Exception\DatabaseException;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class UsersTable extends \Core\Table\AbstractServiceTable {

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Users
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\Users';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'id';

    public function getUserInfosByMail($sMail) {
        try {
            $row = $this->selectby(array("email" => $sMail));
        } catch (Exception $e) {
            throw new DatabaseException(11000, 6, $this->_getServiceLocator(), $sMail, $e);
        }
        return (!$row) ? false : $row;
    }

    public function getByKey($key) {
        try {
            $row = $this->selectby(array("keyValidMail" => $key));
        } catch (Exception $e) {
            throw new DatabaseException(11000, 6, $this->_getServiceLocator(), $key, $e);
        }
        return (!$row) ? false : $row;
    }
    
    public function getByforgetpassKey($key) {
        try {
            $row = $this->selectby(array("forgetpass" => $key));
        } catch (Exception $e) {
            throw new DatabaseException(11000, 6, $this->_getServiceLocator(), $key, $e);
        }
        return (!$row) ? false : $row;
    }

    public function addKeyValidMail($sMail, $key) {
        try {
            $this->update(array('keyValidMail' => $key), array('email' => $sMail));
            return true;
        } catch (\Exception $e) {
            throw new DatabaseException(11000, 1, $this->_getServiceLocator(), array('mail' => $sMail, 'key' => $key), $e);
        }
    }
    
    public function addForgetpass($sMail, $key) {
        try {
            $this->update(array('forgetpass' => $key), array('email' => $sMail));
            return true;
        } catch (\Exception $e) {
            throw new DatabaseException(11000, 1, $this->_getServiceLocator(), array('mail' => $sMail, 'forgetpass' => $key), $e);
        }
    }

    public function validateUser($sMail) {
        try {
            $this->update(array('keyValidMail' => null, "state" => 1), array('email' => $sMail));
            return true;
        } catch (\Exception $e) {
            throw new DatabaseException(11000, 1, $this->_getServiceLocator(), $sMail, $e);
        }
    }

    public function updateLastConnection($id) {
        try {
            $this->update(array('lastConnection' => new Expression('Now()')), array('id' => $id));
            return true;
        } catch (\Exception $e) {
            throw new DatabaseException(11000, 1, null, null, null, $this->_getServiceLocator(), $id, $e);
        }
    }
    
    public function updatepwd($hash,$sMail)
    {
        try {
            $this->update(array('password' => $hash, 'forgetpass'=>''), array('email' => $sMail));
            return true;
        } catch (\Exception $e) {
            throw new DatabaseException(11000, 1, null, null, null, $this->_getServiceLocator(), $id, $e);
        }
    }

}
