<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class BossesHasNpcTable extends \Core\Table\AbstractTable
{

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'bosses_has_npc';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\BossesHasNpc
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\BossesHasNpc';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idBosses';


}

