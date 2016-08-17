<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class EvenementsTemplateTable extends \Core\Table\AbstractTable
{

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'evenements_template';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\EvenementsTemplate
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\EvenementsTemplate';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idEvenements_template';


}

