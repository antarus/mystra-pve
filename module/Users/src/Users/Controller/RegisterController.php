<?php

namespace Users\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Application\Service\LogService;

use Zend\Mail\Message;
use Zend\Mime\Message as MimeMessage;
use Zend\Mime\Part as MimePart;


class RegisterController extends AbstractActionController {

    private $_servTranslator;
    private $_logService;
    private $_tableUser;
    
    /**
     * Returne une instance de la table en lazy.
     *
     * @return \Commun\Table\PersonnagesTable
     */
    public function getTableUsers() {
        if (!$this->_tableUser) {
            $this->_tableUser = $this->getServiceLocator()->get('Commun\Table\UsersTable');
        }
        return $this->_tableUser;
    }
    
    /**
     * Retourne le service de traduction en mode lazy.
     *
     * @return
     */
    public function _getServTranslator()
    {
        if (!$this->_servTranslator) {
            $this->_servTranslator = $this->getServiceLocator()->get('translator');
        }
        return $this->_servTranslator;
    }
    
        /**
     * Lazy getter pour le service de logs
     * @return service Le service de logs
     */
    private function _getLogService() {
        return  $this->_logService ?
                    $this->_logService :
                    $this->_logService = $this->getServiceLocator()->get('LogService');
    }
    
    public function sendconfirmmailAction()
    {
        $oViewModel = new ViewModel(array('mail'=>  base64_decode($this->params('mail')) ));
        $oViewModel->setTemplate('users/register/sendconfirmmail');
        return $oViewModel;
    }
    
    public function validatemailAction()
    {
        $key = $this->params('key');
        if(!isset($key))
        {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Votre url de validation est incomplete."), 'error');
            $this->_getLogService()->log(LogService::ERR, "Demande de validation d'email avec Key vide", LogService::USER);
            
            return $this->redirect()->toRoute('home');
        }
        else
        {
            $user = $this->getTableUsers()->getByKey($key);
            
            if(!$user)
            {
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Votre url de validation est incorrect."), 'error');
                $this->_getLogService()->log(LogService::ERR, "key inconnue $key", LogService::USER);

                return $this->redirect()->toRoute('home');
            }
            $key = base64_decode($key);
            $aKey = explode('-',$key);
            $mailQuery = $aKey[1];
            if($user->email == $mailQuery)
            {
                $this->getTableUsers()->validateUser($mailQuery);
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Votre compte à été validé avec succès."), 'error');
                $this->_getLogService()->log(LogService::ERR, "validation du compte $mailQuery", LogService::USER);

                return $this->redirect()->toRoute('home');
            }
            else {
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("L'url ne vous correspond pas."), 'error');
                $this->_getLogService()->log(LogService::ERR, "key non valide avec mail $key", LogService::USER);

                return $this->redirect()->toRoute('home');
            }
        }
    }
    
    public function sendregistermailAction()
    {
        $aRequest = $this->getRequest();
        $aPost = $aRequest->getPost();
        $sMail = ($this->params('mail'))? $this->params('mail'): $aPost['mail'];
        
        if(!$this->_validUser($sMail))
            return $this->redirect()->toRoute('register-sendmailconfirm',array('mail'=> base64_encode($sMail)));         
        
        $key = $this->_generateKeyValidMail($sMail);

        $oViewModel = new ViewModel(array('key'=>$key));
        $oViewModel->setTemplate('users/register/mail_register');
        $oViewModel->setTerminal(true);
        $sm = $this->getServiceLocator();
             

        $html = new MimePart(nl2br($sm->get('ViewRenderer')->render($oViewModel)));
        $html->type = "text/html";
        
        $body = new MimeMessage();
        $body->setParts(array($html));

        $oMail = new Message();
        $oMail->setBody($body);
        $oMail->setEncoding('UTF-8');
        $oMail->setFrom('contact@raid-tracker.com');
        $oMail->addTo($sMail);
       // $oMail->addCc('contact@raid-tracker.com');
        $oMail->setSubject($this->_getServTranslator()->translate('Confirmation de votre inscription à RTK'));

        $oSmtpOptions = new \Zend\Mail\Transport\SmtpOptions();  
        $oSmtpOptions->setHost('auth.smtp.1and1.fr')
                    ->setConnectionClass('login')
                    ->setName('s19436168.domainepardefaut.fr')
                    ->setConnectionConfig(array(
                        'username' => 'contact@raid-tracker.com',
                        'password' => 'crocodile83',
                        'ssl' => 'tls',
                    ));

        $oSend = new \Zend\Mail\Transport\Smtp($oSmtpOptions);
        
        $bSent = true;
        
        try {
            $oSend->send($oMail);
        } catch (\Zend\Mail\Transport\Exception\ExceptionInterface $e) {
            $bSent = false;
        }
        
        if($bSent)
        {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("votre email à été send."), 'success');
            $this->_getLogService()->log(LogService::NOTICE, "email envoyer à $sMail", LogService::USER);
        }
        else
        {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Soucit lors de l'envoie du mail."), 'error');
            $this->_getLogService()->log(LogService::ERR, "Erreur d'envoie de mail à $sMail", LogService::USER);
            
        }           
        return $this->redirect()->toRoute('register-sendmailconfirm',array('mail'=> base64_encode($sMail)));
    }
    
    private function _generateKeyValidMail($sMail)
    {
        $key = base64_encode(time().'-'.$sMail);
        
        if($this->getTableUsers()->addKeyValidMail($sMail,$key))
            return $key;
        else
        {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Erreur RTK dsl :)."), 'error');
            $this->_getLogService()->log(LogService::ERR, "Erreur lors de lajout de la key $key pour $sMail", LogService::USER);
            return $this->redirect()->toRoute('register-sendmailconfirm',array('mail'=> base64_encode($sMail)));
        }
    }
    
    private function _stopSpam($keyValidMail)
    {
        if($keyValidMail==NULL) return false;
        else
        {
            $key = base64_decode($keyValidMail);
            $aKey = explode('-',$key);
            $now = new \DateTime();
            $dQuery = new \DateTime();
            $dQuery->setTimestamp((int)$aKey[0]);
            
            $diff = $now->diff($dQuery); 
            return ($diff->i < 3 && $diff->h == 0)?
                 true : false;
            
        }
    }
    
    private function _validUser($sMail)
    {
        $user = $this->getTableUsers()->getUserInfosByMail($sMail);
        var_dump($user);
        
        if(!$user)
        {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Adresse email inconnue."), 'error');
            $this->_getLogService()->log(LogService::ERR, "Email inconnue en base $sMail", LogService::USER);
            return false;
        }
        elseif($user->state == 1)
        {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Compte déjà actif."), 'error');
            $this->_getLogService()->log(LogService::ERR, "Compte déjà actif:  $sMail", LogService::USER);        
            return false; 
        }
        elseif($user->state == 2)
        {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Compte desactiver, contacter un administrateur pour plus d'infos."), 'error');
            $this->_getLogService()->log(LogService::ERR, "Compte desactiver:  $sMail", LogService::USER);
            return false;          
        }
        elseif($this->_stopSpam($user->keyValidMail))
        {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Vous avez demander un email il y'a peu de temps."), 'error');
            $this->_getLogService()->log(LogService::ERR, "SPAM:  $sMail", LogService::USER);     
            return false;      
        }
        else return true;
        
    }
    
    public function getgravatarAction() {
        
        $aRequest = $this->getRequest();
        $aResult = $aRequest->getPost();
        
        $aSettings = array(
                    'img_size'    => 100,
                    'default_img' => \Zend\View\Helper\Gravatar::DEFAULT_MONSTERID,
                    'rating'      => \Zend\View\Helper\Gravatar::RATING_G,
                    'secure'      => null,
                    );
        $sMail = $aResult['mail'];
        
        
        
        $viewHelperManager = $this->getServiceLocator()->get('ViewHelperManager');
	$sGravatar = $viewHelperManager->get('gravatar')->__invoke($sMail,$aSettings)->__toString();
        
        
        return new jsonModel(array('gravatar'=>$sGravatar));
    }

    
}
