<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class ModeDifficulteTable extends \Core\Table\AbstractTable {

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'mode_difficulte';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\ModeDifficulte
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\ModeDifficulte';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idMode';

    /**
     *  Retourne une liste des roster avec les paramêtres passé.
     * Les paramatres par defaut sont:
     * $aParam = array(
     *       'rech' => $aParam["rech"],
     *        'champs_mode' => array(
     *            'idMode',
     *            'nom'
     *        ),
     *        'limit' => 20
     *    );
     *
     * @param type $aParam
     * @return array
     */
    function getAutoComplete($aParam) {
        if (!isset($aParam)) {
            $aParam = array(
                'rech' => $aParam["rech"],
                'champs_mode' => array(
                    'idMode',
                    'nom'
                ),
                'limit' => 20
            );
        }
        if (!isset($aParam['champs_mode'])) {
            $aParam['champs_mode'] = array(
                'idMode',
                'nom'
            );
        }

        $sql = new \Zend\Db\Sql\Sql($this->getAdapter());
        $oQuery = $sql->select();

        $oQuery->columns($aParam['champs_mode'])
                ->from(array('m' => 'mode_difficulte'));

        if (isset($aParam['rech'])) {
            $oQuery->where("m.nom like '%" . strtolower($aParam['rech']) . "%' ");
        }
        if (isset($aParam['limit'])) {
            $oQuery->limit($aParam['limit']);
        }
        $oQuery->order(array('nom'));
        //$this->debug($oQuery);
        $aReturn = $this->fetchAllArray($oQuery);

        return $aReturn;
    }

}
