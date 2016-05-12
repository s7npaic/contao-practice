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
use Revision6\Nikola\Helper\Misc;

/**
 * Class Listing for the Listing module.
 *
 * @package Revision6\ModuleExample\Module
 */
class Average extends \Module
{
    /**
     * Set the template.
     *
     * @var string
     */
    protected $strTemplate = 'mod_average';

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
    /**
     * Compile the current element
     */

    /**
     * Compile the current element
     */
    protected function compile()
    {
        $container = $GLOBALS['container'];
        /** @var \Database $db */
        $db = $container['database.connection'];

        /** @var \Input $input */
        $input = $container['input'];
        $form = new Form('insert_average', 'POST', function($objHaste) use ($input){
            return $input->post('FORM_SUBMIT') === $objHaste->getFormId();
        });
        /** @var Misc $misc */
        $misc = $container['misc'];
        $form->addFormField('grades',array(
            'label'=> 'Grades',
            'inputType' => 'select',
            'options' => $misc->randomize(),
        ));
        $form->addContaoHiddenFields();
        $form->addSubmitFormField('submit','Submit');
        $this->Template->ispis = $form->generate();
        if($form->isValid() && $form->isSubmitted()) {
            $db->prepare('INSERT INTO tl_average %s')->set(array
            (
                'grades'=> $input->post('grades'),
            ))->execute();
            \Controller::redirect(\Environment::get('uri'));
        }
        
        $this->Template->prosek = $db->query('SELECT AVG(grades) AS avg FROM tl_average')->avg;
    }

   
}














