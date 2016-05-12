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

namespace Revision6\ModuleExample\Module;

/**
 * Class Liisting for the Liisting module.
 *
 * @package Revision6\ModuleExample\Module
 */
class Listiing extends \Module
{
    /**
     * Set the template.
     *
     * @var string
     */
    protected $strTemplate = 'mod_listiing';

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

            $template->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['liist'][0]) . ' ###';
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
        $query = <<<SQL
SELECT *
FROM tl_list AS l
ORDER BY l.tstamp DESC
SQL;

        $database = \Database::getInstance();
        $items    = $database->query($query);

        $itemCollection = array();

        while ($items->next()) {
            $itemCollection[] = array(
                'title'       => $items->title,
                'description' => $items->description
            );
        }

        $this->Template->items = $itemCollection;
    }
}
