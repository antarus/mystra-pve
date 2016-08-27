<?php

namespace Commun\Table;


use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Expression;
use \Commun\Exception\DatabaseException;
/**
 * @author Antarus
 * @project Raid-TracKer
 */
class UsersTable extends \Core\Table\AbstractServiceTable
{

    
    protected $tableGateway;
    
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
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\User';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'id';

    public function __construct($adapter)
    {
        $this->tableGateway = new TableGateway($this->table, $adapter);
    }
    
    public function getUserInfosByMail($sMail)
    {
        try {
            $rowset = $this->tableGateway->select(array("email" =>$sMail ));
        } catch (Exception $e) {
            throw new DatabaseException(11000, 6,$this->_getServiceLocator(), $sMail, $e);   
        }
        $row = $rowset->current();
        return (!$row) ? false: $row;
    }
    
    public function getByKey($key)
    {
        try {
            $rowset = $this->tableGateway->select(array("keyValidMail" =>$key ));
        } catch (Exception $e) {
            throw new DatabaseException(11000, 6,$this->_getServiceLocator(), $key, $e);   
        }
        $row = $rowset->current();
        return (!$row) ? false: $row;
    }
    
    public function addKeyValidMail($sMail,$key)
    {
         try{
            $this->tableGateway->update(array('keyValidMail'=>$key), array('email' => $sMail));
            return true;
        }
        catch (\Exception $e) {
            throw new DatabaseException(11000, 1,$this->_getServiceLocator(), array('mail'=>$sMail,'key'=>$key), $e);
        }
    }
    
    public function validateUser($sMail)
    {
        try{
            $this->tableGateway->update(array('keyValidMail'=>null,"state"=>1), array('email' => $sMail));
            return true;
        }
        catch (\Exception $e) {
            throw new DatabaseException(11000, 1,$this->_getServiceLocator(), $sMail, $e);
        }
    }
    
    public function updateLastConnection($id)
    {
        try{
            $this->tableGateway->update(array('lastConnection'=>new Expression('Now()')), array('id' => $id));
            return true;
        }
        catch (\Exception $e) {
            throw new DatabaseException(11000, 1,null, null, null,$this->_getServiceLocator(), $id, $e);
        }
    }
}

