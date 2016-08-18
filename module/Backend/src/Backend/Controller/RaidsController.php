<?php

namespace Backend\Controller;

use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

/**
 * Controller pour la vue.
 *
 * @author Antarus
 * @project Raid-TracKer
 */
class RaidsController extends \Zend\Mvc\Controller\AbstractActionController {

    private $_servTranslator = null;
    private $_tableRaid = null;
    private $_tablePersonnage;
    private $_tableGuildes;
    private $_tableRaidPersonnages;
    private $_tableItemPersonnageRaid;
    private $_tableItem;

    /**
     * Retourne le service de traduction en mode lazy.
     *
     * @return
     */
    public function _getServTranslator() {
        if (!$this->_servTranslator) {
            $this->_servTranslator = $this->getServiceLocator()->get('translator');
        }
        return $this->_servTranslator;
    }

    /**
     * Returne une instance de la table Personnage en lazy.
     *
     * @return \Commun\Table\PersonnagesTable
     */
    public function getTablePersonnage() {
        if (!$this->_tablePersonnage) {
            $this->_tablePersonnage = $this->getServiceLocator()->get('\Commun\Table\PersonnagesTable');
        }
        return $this->_tablePersonnage;
    }

    /**
     * Returne une instance de la table Raid en lazy.
     *
     * @return \Commun\Table\RaidsTable
     */
    public function getTableRaid() {
        if (!$this->_tableRaid) {
            $this->_tableRaid = $this->getServiceLocator()->get('\Commun\Table\RaidsTable');
        }
        return $this->_tableRaid;
    }

    /**
     * Returne une instance de la table Guilde en lazy.
     *
     * @return \Commun\Table\GuildesTable
     */
    public function getTableGuilde() {
        if (!$this->_tableGuildes) {
            $this->_tableGuildes = $this->getServiceLocator()->get('\Commun\Table\GuildesTable');
        }
        return $this->_tableGuildes;
    }

    /**
     * Returne une instance de la table Guilde en lazy.
     *
     * @return \Commun\Table\RaidPersonnageTable
     */
    public function getTableRaidPersonnages() {
        if (!$this->_tableRaidPersonnages) {
            $this->_tableRaidPersonnages = $this->getServiceLocator()->get('\Commun\Table\RaidPersonnageTable');
        }
        return $this->_tableRaidPersonnages;
    }

    /**
     * Returne une instance de la table Guilde en lazy.
     *
     * @return \Commun\Table\ItemPersonnageRaidTable
     */
    public function getTableItemPersonnageRaid() {
        if (!$this->_tableItemPersonnageRaid) {
            $this->_tableItemPersonnageRaid = $this->getServiceLocator()->get('\Commun\Table\ItemPersonnageRaidTable');
        }
        return $this->_tableItemPersonnageRaid;
    }

    /**
     * Retourne une instance de la table item en lazy.
     *
     * @return \Commun\Table\ItemsTable
     */
    public function getTableItem() {
        if (!$this->_tableItem) {
            $this->_tableItem = $this->getServiceLocator()->get('\Commun\Table\ItemsTable');
        }
        return $this->_tableItem;
    }

    /**
     * Retourne l'ecran de liste.
     * Affiche uniquement la page. Les données sont chargées via ajax plus tard.
     *
     * @return le template de la page liste.
     */
    public function listAction() {
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('backend/raids/list');
        return $oViewModel;
    }

    /**
     * Action pour le listing via AJAX.
     *
     * @return reponse au format Ztable
     */
    public function ajaxListAction() {
        $oTable = new \Commun\Grid\RaidsGrid($this->getServiceLocator(), $this->getPluginManager());
        $oTable->setAdapter($this->getAdapter())
                ->setSource($this->getTableRaid()->getBaseQuery())
                ->setParamAdapter($this->getRequest()->getPost());
        return $this->htmlResponse($oTable->render());
    }

    /**
     * Action pour la création.
     *
     * @return array
     */
    public function createAction() {
        $oForm = new \Commun\Form\RaidsForm(); //new \Commun\Form\RaidsForm($this->getServiceLocator());
        $oRequest = $this->getRequest();

        $oFiltre = new \Commun\Filter\RaidsFilter();
        $oForm->setInputFilter($oFiltre->getInputFilter());

        if ($oRequest->isPost()) {
            $oEntite = new \Commun\Model\Raids();

            $oForm->setData($oRequest->getPost());

            if ($oForm->isValid()) {
                $oEntite->exchangeArray($oForm->getData());
                $this->getTableRaid()->insert($oEntite);
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La raids a été créé avec succès."), 'success');
                return $this->redirect()->toRoute('backend-raids-list');
            }
        }
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('backend/raids/create');
        return $oViewModel->setVariables(array('form' => $oForm));
    }

    /**
     * Action pour la mise à jour.
     *
     * @return array
     */
    public function updateAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        try {
            $oEntite = $this->getTableRaid()->findRow($id);
            if (!$oEntite) {
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Identifiant de raids inconnu."), 'error');
                return $this->redirect()->toRoute('backend-raids-list');
            }
        } catch (\Exception $ex) {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Une erreur est survenue lors de la récupération de la raids."), 'error');
            return $this->redirect()->toRoute('backend-raids-list');
        }
        $oForm = new \Commun\Form\RaidsForm(); //new \Commun\Form\RaidsForm($this->getServiceLocator());
        $oFiltre = new \Commun\Filter\RaidsFilter();
        $oEntite->setInputFilter($oFiltre->getInputFilter());
        $oForm->bind($oEntite);

        $oRequest = $this->getRequest();
        if ($oRequest->isPost()) {
            $oForm->setInputFilter($oFiltre->getInputFilter());
            $oForm->setData($oRequest->getPost());

            if ($oForm->isValid()) {
                $this->getTableRaid()->update($oEntite);
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La raids a été modifié avec succès."), 'success');
                return $this->redirect()->toRoute('backend-raids-list');
            }
        }
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('backend/raids/update');
        return $oViewModel->setVariables(array('id' => $id, 'form' => $oForm));
    }

    /**
     * Action pour la suppression.
     *
     * @return redirection vers la liste
     */
    public function deleteAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('backend-raids-list');
        }
        $oTable = $this->getTableRaid();
        $oEntite = $oTable->findRow($id);
        $oTable->delete($oEntite);
        $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("La raids a été supprimé avec succès."), 'success');
        return $this->redirect()->toRoute('backend-raids-list');
    }

    /**
     * Retourne l'adapter associé a ce modèle.
     *
     * @return \Zend\Db\Adapter\Adapter
     */
    public function getAdapter() {
        return $this->getServiceLocator()->get('\Zend\Db\Adapter\Adapter');
    }

    /**
     * Retourne une response en tant que html.
     *
     * @return page html
     */
    public function htmlResponse($html) {
        $response = $this->getResponse()
                ->setStatusCode(200)
                ->setContent($html);
        return $response;
    }

    /**
     * Affiche la fenetre d'import Eqdkp.
     *
     * @return array
     */
    public function importAction() {
        $aOptImpRaid = array(
            'serveur' => '',
            'eqdkp' => '',
        );
        // Pour optimiser le rendu
        $oViewModel = new ViewModel();
        $oViewModel->setTemplate('backend/raids/import/import');
        $oViewModel->setVariable("import", $aOptImpRaid);
        return $oViewModel;
    }

    /**
     * Import Eqdkp.
     * @param type $sString
     * @return array
     */
    public static function importEqdkp($sString) {
        $reader = new \Zend\Config\Reader\Xml();
        $data = $reader->fromString($sString);
        return $data;
    }

    /**
     * Traitement de l'import eqdkp.
     *
     * @return array
     */
    public function importTraitementAction() {
        $aOptImpRaid = array(
            'serveur' => '',
            'eqdkp' => '',
        );
        $this->layout('layout/ajax');

        $oRequest = $this->getRequest();

        if ($oRequest->isPost()) {
            try {
                $aPost = $oRequest->getPost();
                $this->getTableRaid()->beginTransaction();
                $aRaid = $this->importEqdkp($aPost['txtImport']);
                if (!isset($aRaid['head']['export']['name']) || $aRaid['head']['export']['name'] !== "EQdkp Plus XML") {
                    $result = new JsonModel(array(
                        'error' => array(
                            'code' => 500,
                            'msg' => 'format XML non reconnu'
                        )
                    ));
                    return $result;
                } else {
                    $this->saveImport($aRaid, $aPost['serveur']);
                }
                $this->getTableRaid()->commit();
            } catch (\Exception $ex) {
                // on rollback en cas d'erreur
                $this->getTableRaid()->rollback();
                $aAjaxEx = \Core\Util\ParseException::tranformeExceptionToArray($ex);
                $result = new JsonModel(array(
                    'error' => $aAjaxEx
                ));
                return $result;
            }
        }
        $result = new JsonModel(array(
            'success' => array(
                'msg' => $this->_getServTranslator()->translate('Raid importée avec succès')
            )
        ));
        return $result;
    }

    private function saveImport(array $aRaid, $sServeur) {
        $aLstPersonnage = array();

//raidata:
//    -zones
//        -zone
//    -bosskills
//        -bosskill
//            -0
//            -1 ...
//    -members
//        -member
//            -0
//              name
//              race
//              guild
//              sex
//              class
//              level
//              times
//                  time
//            -1 ...
//    items
//        item
//            -0
//            -1 ...
        try {
            $oData = new \Zend\Config\Config(array(), true);
            $oWriter = new \Zend\Config\Writer\Json();
            $oRaid = $this->saveRaid($aRaid['raiddata']['zones']['zone']);
            $aLstPersonnage = $this->savePersonnages($aRaid['raiddata']['members']['member'], $oRaid, $sServeur, $oData, $oWriter);
            $this->saveItems($aRaid['raiddata']['items']['item'], $aLstPersonnage, $oRaid);
        } catch (\Exception $ex) {
            throw new \Exception("Erreur lors de la sauvagarde de l'import", 0, $ex);
        }
    }

    /**
     * Sauvegarde le raid.
     * @param array $aRaid
     * @return \Commun\Model\Raids
     */
    private function saveRaid($aRaid) {
        $sNom = $aRaid['name'];
        $iDifficulte = $aRaid['difficulty'];
        $sDifficulte = '';

//    0 - None
//    1 - 5-player instance
//    2 - 5-player heroic instance
//    3 - 10-player legacy raid
//    4 - 25-player legacy raid
//    5 - 10-player legacy heroic raid
//    6 - 25-player legacy heroic raid
//    7 - 25-player legacy raid finder
//    8 - Challenge mode
//    9 - 40-player raid
//    10 - Unknown / unused
//    11 - Heroic scenario
//    12 - Scenario
//    13 - Unknown / unused
//    14 - 10-30-player flexible ("normal") raid
//    15 - 10-30-player flexible heroic raid
//    16 - 20-player mythic raid
//    17 - 10-30-player flexible LFR


        switch ($iDifficulte) {
            case 14:
                $sDifficulte = 'flex NM';
                break;
            case 15:
                $sDifficulte = 'flex HM';
                break;
            case 16:
                $sDifficulte = 'raid MM';
                break;
            default:
                break;
        }

        $oRaid = new \Commun\Model\Raids();
        $oRaid->setAjoutePar("Import Raid-TracKer");
        $oRaid->setNote($sNom . ' - ' . $sDifficulte);
        $oRaid->setDate(date('Y-m-d H:i:s', intval($aRaid['enter'])));
        /* @var $oTabRaid \Commun\Model\Raids */
        $oRaid = $this->getTableRaid()->saveOrUpdateRaid($oRaid);
        return $oRaid;
    }

    /**
     * Sauvegarde les personnages du raid.
     * @param array $aMembre
     * @param \Commun\Model\Raids $oRaid
     * @param sring $sServeur
     * @param \Zend\Config\Config $oData
     * @param \Zend\Config\Writer\Json $oWriter
     * @return \Core\Model\Personnages
     */
    private function savePersonnages($aMembre, $oRaid, $sServeur, \Zend\Config\Config $oData, \Zend\Config\Writer\Json $oWriter) {
        try {
            $aLstPersonnage = array();
            foreach ($aMembre as $aPersonnage) {
                $sNom = $aPersonnage['name'];

                $sServeurPersonnage = $sServeur;
                // si le nom contient un '-' alors il est suivi du nom du serveur
                $pos = strrpos($sNom, "-");
                if ($pos !== false) {
                    $sServeurPersonnage = substr($sNom, ($pos + 1));
                    $sNom = substr($sNom, 0, ($pos));
                }
                $sServeurPersonnage = preg_replace('/(\w+)([A-Z])/U', '\\1 \\2', $sServeurPersonnage);
                $sServeurPersonnage = str_replace('des', ' des', $sServeurPersonnage);

                $aOptPersonnage = array(
                    'nom' => $sNom,
                    'serveur' => $sServeurPersonnage);
// ne marche pas avec les membre sur sargeras et chez mystra (c'est le serveur sargeras qui du coup utiliser pour chercher la guilde mystra)
// pas très grave
//                if (isset($aPersonnage['guild'])) {
//                    $aOptGuilde = array(
//                        'guilde' => $aPersonnage['guild'],
//                        'serveur' => $sServeurPersonnage,
//                        'lvlMin' => 100,
//                        'imp-membre' => 'Non',
//                    );
//                    $oGuildes = $this->getTableGuilde()->importGuilde($aOptGuilde);
//                }
                $aPersoBnet = $this->getTablePersonnage()->importPersonnage($aOptPersonnage);
                $oPersonnage = \Core\Util\ParserWow::extraitPersonnageDepuisBnet($aPersoBnet);
                $oPersonnage = $this->getTablePersonnage()->saveOrUpdatePersonnage($oPersonnage);

                // on cree le lien raid personnage
                $this->getTableRaidPersonnages()->saveOrUpdateRaid($oPersonnage, $oRaid);
                $aLstPersonnage[] = $oPersonnage;
            }
            return $aLstPersonnage;
        } catch (\Exception $ex) {
            throw new \Exception("Erreur lors de la sauvagarde des personnages", 0, $ex);
        }
    }

    /**
     * Sauvegarde les items du raid par personnage.
     *
     * @param array $aItems
     * @param array $aLstPersonnage
     * @param \Commun\Model\Raids $oRaid
     */
    private function saveItems($aItems, $aLstPersonnage, $oRaid) {
        try {
            foreach ($aItems as $aItem) {

                $aInfoItem = $this->getTableItem()->extractInfoItem($aItem['itemid']);
                $aPost = array('id' => $aInfoItem[0]);
                $oItem = $this->getTableItem()->importItem($aPost);
                $oPersonnage = $this->findPersonnage($aLstPersonnage, $aItem['member']);
                if (!isset($oPersonnage)) {
                    throw new \Exception('erreur inconnue. le personnage n\'a pas ete trouvé dans la liste');
                } else {
                    $this->getTableItemPersonnageRaid()->removeAllItemForRaidAndPersonnage($oPersonnage, $oRaid);
                    $this->getTableItemPersonnageRaid()->saveOrUpdateItemPersonnageRaid($oPersonnage, $oRaid, $oItem, $aInfoItem[1]);
                }
            }
        } catch (\Exception $ex) {
            throw new \Exception("Erreur lors de la sauvagarde des items", 0, $ex);
        }
    }

    /**
     * Cherche le nom du personnage dans la liste.
     * @param array $aLstPersonnage
     * @param type $sNom
     * @return \Commun\Model\Personnages
     */
    private function findPersonnage(array $aLstPersonnage, $sNom) {
        $pos = strrpos($sNom, "-");
        if ($pos !== false) {
            $sNom = substr($sNom, 0, $pos);
        }
        $sNom = strtolower($sNom);
        foreach ($aLstPersonnage as $oPersonnage) {
            if ($oPersonnage->getNom() === $sNom) {
                return $oPersonnage;
            }
        }
        return null;
    }

}
