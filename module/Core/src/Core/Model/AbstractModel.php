<?php

namespace Core\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\InputFilter\InputFilterAwareInterface;
use Core\Hydrator\ClassMethodsPublic;

/**
 * Base des models.
 *
 * @author Antarus
 * @project Raid-TracKer
 *
 */
abstract class AbstractModel implements InputFilterAwareInterface {

    /**
     * Le input filter correspondnat au model.
     *
     * @var InputFilter
     */
    protected $inputFilter;

    /**
     * Méthode magique permettant de get ou set une variable a un objet.
     * Les Variables sont stocké dans un array.
     *
     * @param string $sNom
     * @param array $aData
     * @return type
     * @throws \Exception
     */
    public function __call($sNom, $aData = null) {
        $sFormatNom = lcfirst(substr($sNom, 0, 3));
        $sNomColonne = lcfirst(substr($sNom, 3));

        if ($sFormatNom != 'get' && $sFormatNom != 'set') {
            throw new \Exception('La méthode doit commencer par set ou get.');
        }
        //$sNomColonne = strtolower(preg_replace('/([A-Z])/', '_$1', $sNomColonne));

        if ($sFormatNom == 'set') {
            $this->$sNomColonne = $aData[0];
        } else {
            return $this->$sNomColonne;
        }
    }

    /**
     * Utilise les donnée du tableau pour remplir le model.
     *
     * @param array
     */
    public function exchangeArray($aData) {
        $oHydrator = new \Zend\Stdlib\Hydrator\ClassMethods();
        $oHydrator->hydrate($aData, $this);
    }

    /**
     * Returne un array représentant l'objet.
     *
     * @return array
     */
    public function getArrayCopy() {
        $hydrator = new ClassMethodsPublic(FALSE);
        return $hydrator->extract($this);
    }

    /**
     * Définit le input filter.
     *
     * @param \Zend\InputFilter\InputFilterInterface $oInputFilter
     * @throws \Exception
     */
    public function setInputFilter(InputFilterInterface $oInputFilter) {
        $this->inputFilter = $oInputFilter;
    }

    /**
     * Retourne le input filter.
     *
     * @return \Zend\InputFilter\InputFilterInterface
     */
    public function getInputFilter() {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }

}
