<?php

namespace Core\Helper;

use Zend\Mvc\Controller\Plugin\FlashMessenger as PluginFlashMessenger;
use Zend\View\Helper\FlashMessenger as ZendFlash;
use Zend\Mvc\Controller\Plugin\FlashMessenger;

/**
 * Helper permettant d'ajouter la possibilité d'affiché les messages courants et destinés a la prochaine requête.
 *
 * @author Antarus
 */
class Messages extends ZendFlash {

    /**
     * Affiche tous les messages qu'il soit de la requête courante ou destiné a la prochaine.
     *
     * @param string    $namespace
     * @param array     $messages
     * @param array     $classes
     * @param bool|null $autoEscape
     * @return string
     */
    public function renderAllMessages($namespace = PluginFlashMessenger::NAMESPACE_DEFAULT, array $messages = array(), $autoEscape = null) {
        return $this->renderMessages($namespace, $messages, $autoEscape);
    }

    /**
     * Render Messages
     *
     * @param string    $namespace
     * @param array     $messages
     * @param array     $classes
     * @param bool|null $autoEscape
     * @return string
     */
    protected function renderMessages(
    $namespace = PluginFlashMessenger::NAMESPACE_DEFAULT, array $messages = [], array $classes = [], $autoEscape = null
    ) {
        // Prepare classes for opening tag
        if (empty($classes)) {
            if (isset($this->classMessages[$namespace])) {
                $classes = $this->classMessages[$namespace];
            } else {
                $classes = $this->classMessages[PluginFlashMessenger::NAMESPACE_DEFAULT];
            }
            $classes = [$classes];
        }
        switch ($namespace) {
            case FlashMessenger::NAMESPACE_ERROR:
                $classes[] = 'alert-danger';
                $aClasseIcon[] = 'ban';
                break;
            case FlashMessenger::NAMESPACE_WARNING:
                $classes[] = 'alert-warning';
                $aClasseIcon[] = 'warning';
                break;
            case FlashMessenger::NAMESPACE_INFO:
                $classes[] = 'alert-info';
                $aClasseIcon[] = 'info';

                break;
            case FlashMessenger::NAMESPACE_SUCCESS:
                $classes[] = 'alert-success';
                $aClasseIcon[] = 'check';
                break;
            default:
                break;
        }


        if (null === $autoEscape) {
            $autoEscape = $this->getAutoEscape();
        }

        // Flatten message array
        $escapeHtml = $this->getEscapeHtmlHelper();
        $messagesToPrint = [];
        $translator = $this->getTranslator();
        $translatorTextDomain = $this->getTranslatorTextDomain();
        array_walk_recursive(
                $messages, function ($item) use (& $messagesToPrint, $escapeHtml, $autoEscape, $translator, $translatorTextDomain) {
            if ($translator !== null) {
                $item = $translator->translate(
                        $item, $translatorTextDomain
                );
            }

            if ($autoEscape) {
                $messagesToPrint[] = $escapeHtml($item);
                return;
            }

            $messagesToPrint[] = $item;
        }
        );

        if (empty($messagesToPrint)) {
            return '';
        }

        // Generate markup

        $markup = sprintf('<div class = "%s">
        <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">x</button>', implode(' ', $classes));
        $markup .= sprintf('<h4><i class = "icon fa-%s"></i>Alert!</h4>', implode(' ', $aClasseIcon));

        foreach ($messagesToPrint as $msg) {
            $markup .= '<p>' . $msg . '</p>';
        }
        $markup .= '</div>';

        return $markup;
    }

}
