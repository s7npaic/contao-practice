<?php

/**
 * Example contao module.
 *
 * PHP version 5
 *
 * @package    ContaoModuleExample
 * @author     Christopher Boelter <c.boelter@revision6.de>
 * @copyright  Revision6 GmbH
 * @license    LGPL.
 * @filesource
 */

namespace Revision6\Nikola\Module;
use Contao\Database;
use Contao\ModuleLogin;
use Haste\Form\Form;

/**
 * Class Listing for the Listing module.
 *
 * @package Revision6\ModuleExample\Module
 */
class Bla3 extends ModuleLogin
{
    public function compile()
    {
        // Show logout form
        if (FE_USER_LOGGED_IN)
        {
            $this->import('FrontendUser', 'User');
            $this->strTemplate = ($this->cols > 1) ? 'mod_logout_2cl' : 'mod_logout_1cl';

            /** @var \FrontendTemplate|object $objTemplate */
            $objTemplate = new \FrontendTemplate($this->strTemplate);

            $this->Template = $objTemplate;
            $this->Template->setData($this->arrData);

            $this->Template->slabel = specialchars($GLOBALS['TL_LANG']['MSC']['logout']);
            $this->Template->loggedInAs = sprintf($GLOBALS['TL_LANG']['MSC']['loggedInAs'], $this->User->username);
            $this->Template->action = ampersand(\Environment::get('indexFreeRequest'));

            if ($this->User->lastLogin > 0)
            {
                /** @var \PageModel $objPage */
                global $objPage;

                $this->Template->lastLogin = sprintf($GLOBALS['TL_LANG']['MSC']['lastLogin'][1], \Date::parse($objPage->datimFormat, $this->User->lastLogin));
            }

            return;
        }
        $container=$GLOBALS['container'];
        $db=$container['database.connection'];
        $bla=time();
        $db->query('INSERT INTO tl_bla3 (timed) VALUES (CURRENT_TIME ) ');
        $this->Template->ispis=$db->query('SELECT timed FROM tl_bla3')->timed;

        
        $this->strTemplate = ($this->cols > 1) ? 'mod_login_2cl' : 'mod_login_1cl';

        /** @var \FrontendTemplate|object $objTemplate */
        $objTemplate = new \FrontendTemplate($this->strTemplate);

        $this->Template = $objTemplate;
        $this->Template->setData($this->arrData);

        $blnHasError = false;

        if (!empty($_SESSION['TL_ERROR']))
        {
            $blnHasError = true;
            $_SESSION['LOGIN_ERROR'] = $_SESSION['TL_ERROR'][0];
            $_SESSION['TL_ERROR'] = array();
        }

        if (isset($_SESSION['LOGIN_ERROR']))
        {
            $blnHasError = true;
            $this->Template->message = $_SESSION['LOGIN_ERROR'];
        }

        $this->Template->hasError = $blnHasError;
        $this->Template->username = $GLOBALS['TL_LANG']['MSC']['username'];
        $this->Template->password = $GLOBALS['TL_LANG']['MSC']['password'][0];
        $this->Template->action = ampersand(\Environment::get('indexFreeRequest'));
        $this->Template->slabel = specialchars($GLOBALS['TL_LANG']['MSC']['login']);
        $this->Template->value = specialchars(\Input::post('username'));
        $this->Template->autologin = ($this->autologin && \Config::get('autologin') > 0);
        $this->Template->autoLabel = $GLOBALS['TL_LANG']['MSC']['autologin'];



        
    }
}
        