<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class NpcTranslateTable extends \Core\Table\AbstractServiceTable {

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'npc_translate';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Npc
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\NpcTranslate';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idNpcTranslate';

}
