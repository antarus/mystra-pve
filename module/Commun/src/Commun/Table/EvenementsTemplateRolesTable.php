<?php

namespace Commun\Table;

/**
 * @author Antarus
 * @project Raid-TracKer
 */
class EvenementsTemplateRolesTable extends \Core\Table\AbstractTable
{

    /**
     * Nom de la  table.
     *
     * @var string
     */
    protected $table = 'evenements_template_roles';

    /**
     * Objet référent.
     *
     * @var \Commun\Model\EvenementsTemplateRoles
     */
    protected $arrayObjectPrototypeClass = '\\Commun\\Model\\EvenementsTemplateRoles';

    /**
     * Clé primaire de la table.
     *
     * @var int
     */
    protected $nomCle = 'idEvenements_template_roles';


}

