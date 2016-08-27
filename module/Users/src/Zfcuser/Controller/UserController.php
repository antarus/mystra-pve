<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace ZfcUser\Controller;

use Zend\Form\Form;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Stdlib\ResponseInterface as Response;
use Zend\Stdlib\Parameters;
use Zend\View\Model\ViewModel;
use ZfcUser\Service\User as UserService;
use ZfcUser\Options\UserControllerOptionsInterface;
use Application\Service\LogService;

class UserController extends AbstractActionController
{
    const ROUTE_LOGIN        = 'zfcuser/login';
    const ROUTE_REGISTER     = 'zfcuser/register';

    const CONTROLLER_NAME    = 'zfcuser';

    /**
     * @var UserService
     */
    protected $userService;

    /**
     * @var Form
     */
    protected $loginForm;

    /**
     * @var Form
     */
    protected $registerForm;

    /**
     * @todo Make this dynamic / translation-friendly
     * @var string
     */
    protected $failedLoginMessage = 'Authentication failed. Please try again.';

    /**
     * @var string
     */
    protected $loginNamespace = 'zfcuser-login-form';

    /**
     * @var UserControllerOptionsInterface
     */
    protected $options;

    
        private $_servTranslator;
    private $_logService;
    
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
    
    
    public function __construct($userService, $options, $registerForm, $loginForm)
    {
        $this->userService = $userService;
        $this->options = $options;
        $this->registerForm = $registerForm;
        $this->loginForm = $loginForm;
    }
    
    /**
     * User page
     */
    public function indexAction()
    {
        if (!$this->zfcUserAuthentication()->hasIdentity()) {
            return $this->redirect()->toRoute(static::ROUTE_LOGIN);
        }
        return new ViewModel();
    }

    /**
     * Login form
     */
    public function loginAction()
    {
        if ($this->zfcUserAuthentication()->hasIdentity()) {
            return $this->redirect()->toRoute($this->options->getLoginRedirectRoute());
        }

        $request = $this->getRequest();
        $post    = $request->getPost();

        $form    = $this->loginForm;
        $fm = $this->flashMessenger()->setNamespace($this->loginNamespace)->getMessages();
        if (isset($fm[0])) {
            $this->loginForm->setMessages(
                array('identity' => array($fm[0]))
            );
        }

        if ($this->options->getUseRedirectParameterIfPresent()) {
            $redirect = $request->getQuery()->get('redirect', (!empty($post['redirect'])) ? $post['redirect'] : false);
        } else {
            $redirect = false;
        }

        if (!$request->isPost()) {
            return array(
                'loginForm' => $form,
                'redirect'  => $redirect,
                'enableRegistration' => $this->options->getEnableRegistration(),
            );
        }

        $form->setData($post);

        if (!$form->isValid()) {
            $this->flashMessenger()->setNamespace($this->loginNamespace)->addMessage($this->failedLoginMessage);
            return $this->redirect()->toUrl($this->url()->fromRoute(static::ROUTE_LOGIN).($redirect ? '?redirect='. rawurlencode($redirect) : ''));
        }

        // clear adapters
        $this->zfcUserAuthentication()->getAuthAdapter()->resetAdapters();
        $this->zfcUserAuthentication()->getAuthService()->clearIdentity();

        return $this->forward()->dispatch(static::CONTROLLER_NAME, array('action' => 'authenticate'));
    }

    /**
     * Logout and clear the identity
     */
    public function logoutAction()
    {
        $this->zfcUserAuthentication()->getAuthAdapter()->resetAdapters();
        $this->zfcUserAuthentication()->getAuthAdapter()->logoutAdapters();
        $this->zfcUserAuthentication()->getAuthService()->clearIdentity();

        $redirect = $this->params()->fromPost('redirect', $this->params()->fromQuery('redirect', false));

        if ($this->options->getUseRedirectParameterIfPresent() && $redirect) {
            return $this->redirect()->toRoute($redirect);
        }

        return $this->redirect()->toRoute($this->options->getLogoutRedirectRoute());
    }

    /**
     * General-purpose authentication action
     */
    public function authenticateAction()
    {
        if ($this->zfcUserAuthentication()->hasIdentity()) {
            return $this->redirect()->toRoute($this->options->getLoginRedirectRoute());
        }

        $adapter = $this->zfcUserAuthentication()->getAuthAdapter();
        $redirect = $this->params()->fromPost('redirect', $this->params()->fromQuery('redirect', false));

        $result = $adapter->prepareForAuthentication($this->getRequest());

        // Return early if an adapter returned a response
        if ($result instanceof Response) {
            return $result;
        }

        $auth = $this->zfcUserAuthentication()->getAuthService()->authenticate($adapter);
        
        // ths
        if($auth->getCode() == -4)
        {
            return $this->redirect()->toRoute('register-sendmailconfirm');
        }
                
        if (!$auth->isValid()) {
            $this->flashMessenger()->setNamespace($this->loginNamespace)->addMessage($this->failedLoginMessage);
            $adapter->resetAdapters();
            return $this->redirect()->toUrl(
                $this->url()->fromRoute(static::ROUTE_LOGIN) .
                ($redirect ? '?redirect='. rawurlencode($redirect) : '')
            );
        }

        if ($this->options->getUseRedirectParameterIfPresent() && $redirect) {
            return $this->redirect()->toRoute($redirect);
        }

        $route = $this->options->getLoginRedirectRoute();

        if (is_callable($route)) {
            $route = $route($this->zfcUserAuthentication()->getIdentity());
        }

        return $this->redirect()->toRoute($route);
    }

    /**
     * Register new user
     */
    public function registerAction()
    {
        // if the user is logged in, we don't need to register
        if ($this->zfcUserAuthentication()->hasIdentity()) {
            // redirect to the login redirect route
            return $this->redirect()->toRoute($this->options->getLoginRedirectRoute());
        }
        // if registration is disabled
        if (!$this->options->getEnableRegistration()) {
            return array('enableRegistration' => false);
        }

        $request = $this->getRequest();
        $service = $this->userService;
        $form = $this->registerForm;

        if ($this->options->getUseRedirectParameterIfPresent() && $request->getQuery()->get('redirect')) {
            $redirect = $request->getQuery()->get('redirect');
        } else {
            $redirect = false;
        }

        $redirectUrl = $this->url()->fromRoute(static::ROUTE_REGISTER)
            . ($redirect ? '?redirect=' . rawurlencode($redirect) : '');
        
        $prg = $this->prg($redirectUrl, true);

        if ($prg instanceof Response) {
            return $prg;
        } elseif ($prg === false) {
            return array(
                'registerForm' => $form,
                'enableRegistration' => $this->options->getEnableRegistration(),
                'redirect' => $redirect,
            );
        }

        $post = $prg;   
        
        $user = $service->register($post);
        

        $redirect = isset($prg['redirect']) ? $prg['redirect'] : null;

       // THS surcouche recaptcha
        
        $recaptcha = new \ZendService\ReCaptcha\ReCaptcha('6LcEWCgTAAAAAKKdtWHg5y5Q8A4_umUP0WK_JY-I',
                                                 '6LcEWCgTAAAAAFUOb_kRkfLiQ2aZaxjgTKCDI74v');
        
        if(empty($prg['g-recaptcha-response']))
        {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Veuillez valider votre captcha."), 'error');
            return array(
                'registerForm' => $form,
                'enableRegistration' => $this->options->getEnableRegistration(),
                'redirect' => $redirect,
            );
                
        }
        
        $result = $recaptcha->verify(
            $prg['g-recaptcha-response']
        );
        
        if (!$result->isValid()) {
            $this->flashMessenger()->addMessage($this->_getServTranslator()->translate("Veuillez verifier votre captcha."), 'error');
            return array(
                'registerForm' => $form,
                'enableRegistration' => $this->options->getEnableRegistration(),
                'redirect' => $redirect,
            );
        }
        // THS END
        
        
        if (!$user) {
            return array(
                'registerForm' => $form,
                'enableRegistration' => $this->options->getEnableRegistration(),
                'redirect' => $redirect,
            );
        }

        if ($service->getOptions()->getLoginAfterRegistration()) {
            $identityFields = $service->getOptions()->getAuthIdentityFields();
            if (in_array('email', $identityFields)) {
                $post['identity'] = $user->getEmail();
            } elseif (in_array('username', $identityFields)) {
                $post['identity'] = $user->getUsername();
            }
            $post['credential'] = $post['password'];
            $request->setPost(new Parameters($post));
            return $this->forward()->dispatch(static::CONTROLLER_NAME, array('action' => 'authenticate'));
        }
        // TODO: Add the redirect parameter here...
        // ths 
        return $this->redirect()->toRoute('register-sendmail',array('mail'=> base64_encode($post['email'])));
       // return $this->redirect()->toUrl($this->url()->fromRoute(static::ROUTE_LOGIN) . ($redirect ? '?redirect='. rawurlencode($redirect) : ''));
    }
}
