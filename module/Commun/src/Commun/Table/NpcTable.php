<?php

namespace Commun\Table;

use \Commun\Exception\DatabaseException;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class NpcTable extends \Core\Table\AbstractServiceTable {

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'npc';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Npc
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\Npc';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idNpc';
    protected $_tableNpcTranslate = null;

    /**
     * Returne une instance de la table ZoneTranslate  en lazy.
     *
     * @return \Commun\Table\ZoneTranslateTable
     */
    public function _getTableNpcTranslate() {
        if (!$this->_tableNpcTranslate) {
            $this->_tableNpcTranslate = $this->_getServiceLocator()->get('\Commun\Table\NpcTranslateTable');
        }
        return $this->_tableNpcTranslate;
    }

    public function getBaseQuery() {

        try {
//               select z.*, zt.locale,zt.nom from zone z
//right join zone_translate zt on zt.idZone=z.idZone
            $sql = new \Zend\Db\Sql\Sql($this->getAdapter());
            $oQuery = $sql->select();
            $oQuery->from(array('n' => 'npc'))
                    ->join(array('nt' => 'npc_translate'), 'nt.idNpc=n.idNpc', array('nom', 'locale'), \Zend\Db\Sql\Select::JOIN_RIGHT);

            $oQuery->order("idNpc");
            return $oQuery;
        } catch (\Exception $exc) {
            throw new DatabaseException(4000, 4, $this->_getServiceLocator(), $iIdRoster, $exc);
        }
    }

    /**
     * Met à jour un objet en base.
     *
     * @param mixed $mObject
     * @return int
     * @throws \Exception\BadMethodCallException
     */
    public function update($mObject, $where = null) {
        $npc = parent::update($mObject, $where);
        try {
            $oTabZoneTrans = $this->_getTableNpcTranslate()->selectBy(
                    array(
                        "locale" => $mObject->getLocale(),
                        "nom" => $mObject->getNom()));
            $oNpcTranslate = new \Commun\Model\NpcTranslate();
            $oNpcTranslate->setIdNpc($mObject->getIdNpc());
            $oNpcTranslate->setLocale($mObject->getLocale());
            $oNpcTranslate->setNom($mObject->getNom());
            // si n'existe pas on insert
            if (!$oTabZoneTrans) {
                try {
                    $this->_getTableNpcTranslate()->insert($oNpcTranslate);
                } catch (\Exception $exc) {
                    throw new DatabaseException(12500, 2, $this->_getServiceLocator(), $mObject->getArrayCopy(), $exc);
                }
            } else {
                try {
                    // sinon on update
                    $oNpcTranslate->setIdNpcTranslate($oTabZoneTrans->getIdNpcTranslate());
                    $this->_getTableNpcTranslate()->update($oNpcTranslate);
                } catch (\Exception $exc) {
                    throw new DatabaseException(12500, 1, $this->_getServiceLocator(), $mObject->getArrayCopy(), $exc);
                }
            }
            return $npc;
        } catch (\Exception $exc) {
            throw new DatabaseException(12500, 4, $this->_getServiceLocator(), $mObject->getArrayCopy(), $exc);
        }
    }

    /**
     * Insert l'objet en base.
     *
     * @param mixed $mObject
     * @return int
     * @throws \Exception\BadMethodCallException
     */
    public function insert($mObject) {
        $bosses = parent::insert($mObject);

        $npcTranslate = new \Commun\Model\NpcTranslate();
        $npcTranslate->setIdNpc($mObject->getIdNpc());
        $npcTranslate->setLocale($mObject->getLocale());
        $npcTranslate->setNom($mObject->getNom());
        $this->_getTableNpcTranslate()->insert($npcTranslate);

        return $bosses;
    }

}
