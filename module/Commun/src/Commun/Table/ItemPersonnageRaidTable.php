<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Mystra
 */
class ItemPersonnageRaidTable extends \Core\Table\AbstractTable
{

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'item_personnage_raid';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\ItemPersonnageRaid
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\ItemPersonnageRaid';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idItemRaidPersonnage';


}

