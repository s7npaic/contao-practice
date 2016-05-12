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

$GLOBALS['TL_DCA']['tl_module']['palettes']['liist'] =
    '{title_legend},name,headline,type;' .
    '{protected_legend:hide},protected;' .
    '{expert_legend:hide},metamodel_donotindex,guests,cssID,space';