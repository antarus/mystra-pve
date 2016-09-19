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
                $aPages['updateBy'] = $userID;
                $this->insert($aPages);
                return true;
            }
        } catch (\Exception $exc) {
            throw new DatabaseException(12000, 2, $this->_getServiceLocator(), array(), $exc);
            return false;
        }
    }
    public function saveArticle($idContent, $content, $userID, $titleArticle) {
        $aArticle = array('type' => 'article',
            'idContent' => $idContent,
            'content' => $content,
            'titleArticle'=> $titleArticle,
            'lastUpdate'=> new Expression('Now()'));
        

        try {
            if ($this->selectBy(array("idContent" => $aArticle['idContent'],
                        "type" => $aArticle['type'],
                "titleArticle" => $aArticle['titleArticle']))) {
                $aArticle['updateBy'] = $userID;
                $this->update($aArticle, array("idContent" => $aArticle['idContent'],
                    "type" => $aArticle['type']));
                return true;
            } else {
                $aArticle['idContent'] = null;
                $aArticle['idPages'] = 1;
                $aArticle['writeBy'] = $userID;
                $aArticle['updateBy'] = $userID;
                
                $this->insert($aArticle);
                return true;
            }
        } catch (\Exception $exc) {
            throw new DatabaseException(12000, 2, $this->_getServiceLocator(), array(), $exc);
            return false;
        }
    }

}
