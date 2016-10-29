<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class BossesTranslateTable extends \Core\Table\AbstractServiceTable {

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'bosses_translate';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\Bosses
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\BossesTranslate';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idBossesTranslate';

}
