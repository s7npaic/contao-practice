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
use Haste\Form\Form;

/**
 * Class Listing for the Listing module.
 *
 * @package Revision6\ModuleExample\Module
 */
class Nikola extends \Module
{
    /**
     * Set the template.
     *
     * @var string
     */
    protected $strTemplate = 'mod_nikola';

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
            $template->title    = $this->headline;
            $template->href     = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

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
        $container = $GLOBALS['container'];
        /** @var \Database  $db */
        $db = $container['database.connection'];

        /** @var \Input $input */
        $input = $container['input'];
        $this->Template->nikolas = $db->query("SELECT * FROM tl_nikola")->fetchAllAssoc();

        $form = new Form('insert_Nikola', 'POST', function($objHaste) use ($input){
            return $input->post('FORM_SUBMIT') === $objHaste->getFormId();
        });
        $form->addFormField('title',array(
            'label' => 'Title',
            'inputType' => "text",
            'eval' => array('mandatory' => true),
        ));
        $form->addFormField('description',array(
            'label' => 'Description',
            'inputType' => "text",
            'eval' => array('mandatory' => true),
        ));

        if($form->isValid() && $form->isSubmitted()) {
            $db->prepare("INSERT INTO tl_nikola %s")->set(array(
                'title' => $input->get('title')  ,
                'description' => $input->get('description'),
            ))->execute();
            \Controller::redirect(\Environment::get('uri'));
        }
        $form->addContaoHiddenFields();
        $form->addSubmitFormField('submit','Submit');
        $this->Template->form = $form ->generate();
    }
}
