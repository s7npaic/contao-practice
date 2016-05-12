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
class Uncount extends \Module
{
    /**
     * Set the template.
     *
     * @var string
     */
    protected $strTemplate = 'mod_uncounting';

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

        $uncount = $db->query("SELECT count FROM tl_counting")->count;
        $uncount--;
        $db->prepare('UPDATE tl_counting SET count = ?')->execute($uncount);
        $this->Template->ispis = $uncount;

        echo 123;

    }
}
    