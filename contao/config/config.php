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

// Backend-Module


$GLOBALS['BE_MOD']['content']['liist'] = array(
    'tables' => array(
        'tl_liist',
    ),

);


// Frontend-Module
$GLOBALS['FE_MOD']['application']['nikola'] = 'Revision6\\Nikola\\Module\\Nikola';
$GLOBALS['TL_CONFIG']['disableRefererCheck'] = true;
$GLOBALS['FE_MOD']['application']['counter'] = 'Revision6\\Nikola\\Module\\Counter';
$GLOBALS['FE_MOD']['application']['uncounter'] = 'Revision6\\Nikola\\Module\\Uncount';
$GLOBALS['FE_MOD']['application']['average'] = 'Revision6\\Nikola\\Module\\Average';
$GLOBALS['FE_MOD']['application']['bla2'] = 'Revision6\\Nikola\\Module\\Bla2';
$GLOBALS['FE_MOD']['application']['liist'] = 'Revision6\\Nikola\\Module\\Listiing';
$GLOBALS['FE_MOD']['application']['bla3'] = 'Revision6\\Nikola\\Module\\Bla3';






