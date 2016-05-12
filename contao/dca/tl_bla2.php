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

$GLOBALS['TL_DCA']['tl_bla2'] = array
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
                'id' =>  'primary',
            )
        )
    ),
    //Fields
    'fields' => array
    (
        'id'    => array
        (
            'sql'   => "int(10) unsigned NOT NULL auto_increment"
        ),
        'name'       => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_bla2']['name'],
            'search'    => true,
            'exclude'   => true,
            'inputType' => 'text',
            'eval'      => array('tl_bla2' => 'w50', 'maxlength' => 255, 'mandatory' => true),
            'sql'       => "varchar(255) NOT NULL default ''"
        ),
    )
);

