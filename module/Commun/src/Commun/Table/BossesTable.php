<?php

namespace Commun\Table;

use \Commun\Exception\DatabaseException;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class BossesTable extends \Core\Table\AbstractServiceTable {

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'bosses';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Bosses
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\Bosses';
    protected $_tableBossesTranslate = null;

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idBosses';

    /**
     * Returne une instance de la table ZoneTranslate  en lazy.
     *
     * @return \Commun\Table\ZoneTranslateTable
     */
    public function _getTableBossesTranslate() {
        if (!$this->_tableBossesTranslate) {
            $this->_tableBossesTranslate = $this->_getServiceLocator()->get('\Commun\Table\BossesTranslateTable');
        }
        return $this->_tableBossesTranslate;
    }

    /**
     * Retourne le select query deja configuré par l'adapter et le nom de la table.
     *
     * @return Zend\Db\Sql\Select
     */
    public function getBaseQuery() {

        try {
//               select z.*, zt.locale,zt.nom from zone z
//right join zone_translate zt on zt.idZone=z.idZone
            $sql = new \Zend\Db\Sql\Sql($this->getAdapter());
            $oQuery = $sql->select();
            $oQuery->from(array('b' => 'bosses'))
                    ->join(array('bt' => 'bosses_translate'), 'bt.idBosses=b.idBosses', array('nom', 'locale'), \Zend\Db\Sql\Select::JOIN_RIGHT);

            $oQuery->order("idBosses");
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
        $bosses = parent::update($mObject, $where);
        try {
            $oTabZoneTrans = $this->_getTableBossesTranslate()->selectBy(
                    array(
                        "locale" => $mObject->getLocale(),
                        "nom" => $mObject->getNom()));
            $oBossesTranslate = new \Commun\Model\BossesTranslate();
            $oBossesTranslate->setIdBosses($mObject->getIdBosses());
            $oBossesTranslate->setLocale($mObject->getLocale());
            $oBossesTranslate->setNom($mObject->getNom());
            // si n'existe pas on insert
            if (!$oTabZoneTrans) {
                try {
                    $this->_getTableBossesTranslate()->insert($oBossesTranslate);
                } catch (\Exception $exc) {
                    throw new DatabaseException(9500, 2, $this->_getServiceLocator(), $mObject->getArrayCopy(), $exc);
                }
            } else {
                try {
                    // sinon on update
                    $oBossesTranslate->setIdBossesTranslate($oTabZoneTrans->getIdBossesTranslate());
                    $this->_getTableBossesTranslate()->update($oBossesTranslate);
                } catch (\Exception $exc) {
                    throw new DatabaseException(9500, 1, $this->_getServiceLocator(), $mObject->getArrayCopy(), $exc);
                }
            }
            return $bosses;
        } catch (\Exception $exc) {
            throw new DatabaseException(9500, 4, $this->_getServiceLocator(), $mObject->getArrayCopy(), $exc);
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

        $bossesTranslate = new \Commun\Model\BossesTranslate();
        $bossesTranslate->setIdZone($mObject->getIdBosses());
        $bossesTranslate->setLocale($mObject->getLocale());
        $bossesTranslate->setNom($mObject->getNom());
        $this->_getTableBossesTranslate()->insert($bossesTranslate);

        return $bosses;
    }

}
