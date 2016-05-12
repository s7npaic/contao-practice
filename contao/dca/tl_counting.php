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

$GLOBALS['TL_DCA']['tl_counting'] = array
(
    // Config
    'config'   => array
    (
        'dataContainer'    => 'Table',
        'enableVersioning' => true,
        'sql'              => array
        (
            'keys' => array
            (
                'count' => 'primary',
            )
        )
    ),
    // Fields
    'fields'   => array
    (
        'count'          => array
        (
            'sql' => "int(10) NOT NULL default '0'"
        ),
    )
);
