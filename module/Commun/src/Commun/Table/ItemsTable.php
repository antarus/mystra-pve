<?php

namespace Commun\Table;

use \Bnet\Region;
use \Bnet\ClientFactory;
use \Commun\Exception\BnetException;
use \Commun\Exception\DatabaseException;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class ItemsTable extends \Core\Table\AbstractServiceTable {

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'items';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Items
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\Items';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idItem';
    private $_servBnet;

    /**
     * Retourne le service de battlnet.
     * @return \Bnet\ClientFactory
     */
    private function _getServBnet() {
        if (!$this->_servBnet) {
            $this->_servBnet = $this->_getServiceLocator()->get('Bnet\ClientFactory');
        }
        return $this->_servBnet;
    }

    /**
     * import un item depuis un tableau.
     * @param array $aPost
     * @return  \Commun\Model\Items
     */
    public function importItem($aPost) {
        try {
            $aInfoItem = $this->extractInfoItem($aPost['id']);
            try {
                $oTabItems = $this->selectBy(
                        array(
                            "idBnet" => $aInfoItem[0]));
            } catch (\Exception $exc) {
                throw new DatabaseException(3000, 4, $this->_getServiceLocator()->get('translator'));
            }
            // si n'existe pas on importe
            if (!$oTabItems) {
                $itemBnet = $this->_getServBnet()->warcraft(new Region(Region::EUROPE, "en_GB"))->items();
                $oBnetItem = $itemBnet->find($aInfoItem[0]);
                if (!$oBnetItem) {
                    throw new BnetException(399, $this->_getServiceLocator()->get('translator'));
                }
                $oItem = \Core\Util\ParserWow::extraitItemDepuisBnet($oBnetItem);
                return $this->saveOrUpdateItem($oItem);
            }
            return $oTabItems;
        } catch (\Exception $ex) {
            throw new \Exception("Erreur lors de l'import de l'item", 0, $ex);
        }
    }

    /**
     * Traite la chaine correspondnat a l'itemID  <ItemID>124382::::::::100:268:4:5:4:1798:564:1492:3441:529:::</ItemID>.
     * Cette méthode renvoi <code>124382</code> a l'index 0
     * et <code>1798:564:1492</code> a l'index 1
     * @param string $sItemid
     * @return string
     */
    public function extractInfoItem($sItemid) {
        $aItems = array();

        if (strstr($sItemid, ':') != false) {
            //$sItemid = trim($sItemid, "item\:");
            $sItemid = preg_split("/:/", $sItemid);
            $aItems[0] = $sItemid [0];
            $aItems[1] = $sItemid [13] . ":" . $sItemid [14] . ":" . $sItemid [15] . ":";
        } else {
            $aItems[0] = trim($sItemid);
            $aItems[1] = ":::";
        }
        return $aItems;
    }

    /**
     * Sauvegarde ou met a jour l'item passé.
     * @param \Commun\Model\Items $oItems
     * @return \Core\Model\Items
     */
    public function saveOrUpdateItem($oItems) {
        try {
            $oTabItem = $this->selectBy(array('idBnet' => $oItems->getIdBnet()));
        } catch (\Exception $exc) {
            throw new DatabaseException(3000, 4, $this->_getServiceLocator()->get('translator'));
        }
        //si il existe pas on le cree
        if (!$oTabItem) {
            try {
                $oTabItem = new \Commun\Model\Items();
                $oTabItem->setAjouterPar("Import Raid-TracKer");
                $oTabItem->setNom(strtolower($oItems->getNom()));
                $oTabItem->setIcon($oItems->getIcon());
                $oTabItem->setIdBnet($oItems->getIdBnet());
                $this->insert($oTabItem);
                $oTabItem->setIdItem($this->lastInsertValue);
            } catch (\Exception $exc) {
                throw new DatabaseException(3000, 2, $this->_getServiceLocator()->get('translator'));
            }
        }

        return $oTabItem;
    }

}
