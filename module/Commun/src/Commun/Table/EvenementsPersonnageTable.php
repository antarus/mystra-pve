<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Mystra
 */
class EvenementsPersonnageTable extends \Core\Table\AbstractTable
{

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'evenements_personnage';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\EvenementsPersonnage
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\EvenementsPersonnage';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idEvenement_personnage';


}

