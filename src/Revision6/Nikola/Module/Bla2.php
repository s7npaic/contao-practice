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
use Haste\Form\Form;

/**
 * Class Listing for the Listing module.
 *
 * @package Revision6\ModuleExample\Module
 */
class Bla2 extends \Module
{
    /**
     * Set the template.
     *
     * @var string
     */
    protected $strTemplate = 'mod_bla2';

    /**
     * Modify the default module and render parent generate.
     *
     * @return string
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    public function generate()
    {
        if (TL_MODE == 'BE') {
            $template = new \BackendTemplate('be_wildcard');

            $template->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['list'][0]) . ' ###';
            $template->title = $this->headline;
            $template->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

            return $template->parse();
        }

        return parent::generate();
    }

    /**
     * Compile the frontend module.
     *
     * @return void
     */
    protected function compile()
    {
        $container=$GLOBALS['container'];
        /** @var \Database $db */
        $db=$container['database.connection'];
        /** @var \Input $input */
        $input=$container['input'];

        $form = new Form('insert_Subscribe', 'POST', function($objHaste) use ($input){
            return $input->post('FORM_SUBMIT') === $objHaste->getFormId();
        });
        $form->addFormField('name',array(
            'label' => 'Name',
            'inputType' => "text",
            'eval' => array('mandatory' => true),
        ));
        $form->addContaoHiddenFields();
        $form->addSubmitFormField('submit','Submit');
        $this->Template->ispis = $form->generate();
        if($form->isValid() && $form->isSubmitted()) {
            $db->prepare("INSERT INTO tl_bla2 %s")->set(array(
                'name' => $input->post('name')
            ))->execute();
            \Controller::redirect(\Environment::get('uri'));
        }
        $this->Template->sub = $db->query("SELECT id FROM tl_bla2");
        
    }
}