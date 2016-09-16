<?php

namespace Commun\Table;

use \Commun\Exception\DatabaseException;
use Zend\Db\Sql\Expression;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class ContentTable extends \Core\Table\AbstractServiceTable {

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'content';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Classes
     */
    protected $arrayObjectPrototypeClass = '\Commun\Model\Content';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idContent';

    public function savePage($idPages, $content, $userID) {
        $aPages = array('type' => 'page',
            'idPages' => $idPages,
            'content' => $content,
            'lastUpdate'=> new Expression('Now()'));

        try {
            if ($this->selectBy(array("idPages" => $aPages['idPages'],
                        "type" => $aPages['type']))) {
                $aPages['updateBy'] = $userID;
                $this->update($aPages, array("idPages" => $aPages['idPages'],
                    "type" => $aPages['type']));
                return true;
            } else {
                $aPages['writeBy'] = $userID;
                $this->insert($aPages);
                return $this->lastInsertValue();
            }
        } catch (\Exception $exc) {
            throw new DatabaseException(4000, 4, $this->_getServiceLocator(), $oRaids->getArrayCopy(), $exc);
            return false;
        }
    }

}
