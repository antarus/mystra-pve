<?php

namespace Users\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Application\Service\LogService;

use Zend\Mail\Message;
use Zend\Mime\Message as MimeMessage;
use Zend\Mime\Part as MimePart;

use Zend\Crypt\Password\Bcrypt;


class ForgetpassController extends AbstractActionController {

    private $_servTranslator;
    private $_logService;
    private $_tableUser;
    private $_config;
    
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
    
    private function _getServConfig() {
        if (!$this->_config) {
            $this->_config = $this->getServiceLocator()->get('config'); 
        }
        return $this->_config;
    
        
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
    
    public function indexAction()
    {
        $publicKey = $this->_getServConfig()['google']['publicKey'];
        $privateKey = $this->_getServConfig()['google']['privateKey'];
        
        $oViewModel = new ViewModel(array('publicKey'=>$publicKey,'privateKey' => $privateKey));
        $oViewModel->setTemplate('users/forgetpass/index');
        return $oViewModel;
    }
    
    public function sendforgetpassmailAction()
    {
        $aRequest = $this->getRequest();
        $aPost = $aRequest->getPost();
        $sMail = $aPost['mail'];
        
        if(!$this->_validCaptcha($aPost['g-recaptcha-response']))
           return $this->redirect()->toRoute('forgetpass');           
        
        if(!$this->_validUser($sMail))
            return $this->redirect()->toRoute('forgetpass');         
        
        
        $key = $this->_generateKeyForgetpass($sMail);

        $oViewModel = new ViewModel(array('key'=>$key,'urlProject' => $this->_getServConfig()['urlProjet']));
        $oViewModel->setTemplate('users/forgetpass/mail_forgetpass');
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
        $oMail->setSubject($this->_getServTranslator()->translate('Demande de modification de mot de passe RTK'));

        $oSmtpOptions = new \Zend\Mail\Transport\SmtpOptions();  
        $oSmtpOptions->setHost($this->_getServConfig()['mail']['auth'])
                    ->setConnectionClass('login')
                    ->setName($this->_getServConfig()['mail']['namelocal'])
                    ->setConnectionConfig(array(
                        'username' => $this->_getServConfig()['mail']['username'],
                        'password' => $this->_getServConfig()['mail']['password'],
                        'ssl' => $this->_getServConfig()['mail']['ssl'],
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
            $this->_getLogService()->log(LogService::NOTICE, "email recup mdp envoyer à $sMail", LogService::USER);
        }
        else
        {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Soucit lors de l'envoie du mail."), 'error');
            $this->_getLogService()->log(LogService::ERR, "Erreur d'envoie de mail à $sMail", LogService::USER);
            
        }           
        return $this->redirect()->toRoute('forgetpass');
    }
    
    public function refactorpasswordAction()
    {
        $key = $this->params('key');
        if(!isset($key))
        {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Votre url de recuperation est incomplete."), 'error');
            $this->_getLogService()->log(LogService::ERR, "Demande de recuperation de mdp avec Key vide", LogService::USER);
            
            return $this->redirect()->toRoute('home');
        }
        else
        {
            $user = $this->getTableUsers()->getByforgetpassKey($key);
            if(!$user)
            {
                $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Votre url de validation est incorrect."), 'error');
                $this->_getLogService()->log(LogService::ERR, "key inconnue $key", LogService::USER);

                return $this->redirect()->toRoute('home');
            }

            $oViewModel = new ViewModel(array('key'=>$key));
            $oViewModel->setTemplate('users/forgetpass/refactorpassword');
            return $oViewModel;
            
        }
    }
    
    public function newpwdsaveAction()
    {
        $aRequest = $this->getRequest();
        $aPost = $aRequest->getPost();
        $sMail = $aPost['mail'];
        
        
        $user = $this->getTableUsers()->getByforgetpassKey($aPost['key']);
        if($user)
        {
            $kmail =$user->email;
        }
        else
        {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Adresse email inconnue."), 'error');
            $this->_getLogService()->log(LogService::ERR, "Email inconnue en base $sMail", LogService::USER);
            return $this->redirect()->toRoute('home');
        }
        
        if($kmail !== $sMail)
        {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Adresse email ne correspond pas avec votre demande."), 'error');
            $this->_getLogService()->log(LogService::ERR, "Email different de key $sMail", LogService::USER);
            return $this->redirect()->toRoute('forgetpass',array('action'=>'refactorpassword','key'=> $aPost['key']));
        }
        elseif(strlen($aPost['password']) < 6)
        {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Le mdp doit contenir un minimum de 8 caracteres."), 'error');
            $this->_getLogService()->log(LogService::ERR, "mdp trop court. $sMail", LogService::USER);
            return $this->redirect()->toRoute('forgetpass',array('action'=>'refactorpassword','key'=> $aPost['key']));
        }
        elseif($aPost['password'] !== $aPost['passwordconfirm'] )
        {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Les deux mots de passe ne corresponde pas."), 'error');
            $this->_getLogService()->log(LogService::ERR, "password different $sMail", LogService::USER);
            return $this->redirect()->toRoute('forgetpass',array('action'=>'refactorpassword','key'=> $aPost['key']));
        }
        else
        {
            $bcrypt = new Bcrypt();
            $bcrypt->setCost(14); 
            $hash = $bcrypt->create($aPost['password']);
            $this->getTableUsers()->updatepwd($hash,$sMail);
            
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Votre mot de passe a été mis à jour."), 'succes');
            $this->_getLogService()->log(LogService::ERR, "Mot de passe modifié pour $sMail", LogService::USER);
            return $this->redirect()->toRoute('home');
        }
    }
    
    private function _validUser($sMail)
    {
        $user = $this->getTableUsers()->getUserInfosByMail($sMail);

        if(!$user)
        {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Adresse email inconnue."), 'error');
            $this->_getLogService()->log(LogService::ERR, "Email inconnue en base $sMail", LogService::USER);
            return false;
        }
        elseif($user->state == 2)
        {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Compte desactiver, contacter un administrateur pour plus d'infos."), 'error');
            $this->_getLogService()->log(LogService::ERR, "Compte desactiver:  $sMail", LogService::USER);
            return false;          
        }
        elseif($this->_stopSpam($user->forgetpass))
        {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Vous avez demander un email il y'a peu de temps."), 'error');
            $this->_getLogService()->log(LogService::ERR, "SPAM:  $sMail", LogService::USER);     
            return false;      
        }
        else return true;
        
    }
    
    private function _stopSpam($keyForget)
    {
        if($keyForget==NULL) return false;
        else
        {
            $key = base64_decode($keyForget);
            $aKey = explode('-',$key);
            $now = new \DateTime();
            $dQuery = new \DateTime();
            $dQuery->setTimestamp((int)$aKey[0]);
            
            $diff = $now->diff($dQuery); 
            return ($diff->i < 3 && $diff->h == 0)?
                 true : false;
            
        }
    }
    
    private function _generateKeyForgetpass($sMail)
    {
        $kmail = explode('@',$sMail);
        $key = base64_encode(time().'-'.$kmail[0]);
        
        if($this->getTableUsers()->addForgetpass($sMail,$key))
            return $key;
        else
        {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Erreur RTK dsl :)."), 'error');
            $this->_getLogService()->log(LogService::ERR, "Erreur lors de lajout de la key $key pour $sMail", LogService::USER);
            return $this->redirect()->toRoute('forgetpass');
        }
    }
    
    private function _validCaptcha($captchaReponse)
    {
         $recaptcha = new \ZendService\ReCaptcha\ReCaptcha( $this->_getServConfig()['google']['publicKey'],
                                                            $this->_getServConfig()['google']['privateKey']);
        
        if(empty($captchaReponse))
        {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Veuillez valider votre captcha."), 'error');
            return false;                
        }
        
        $result = $recaptcha->verify($captchaReponse);
        
        if (!$result->isValid()) {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Veuillez verifier votre captcha."), 'error');
            return false;
        }
        else return true;
    }
}
