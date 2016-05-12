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

$GLOBALS['TL_DCA']['tl_nikola'] = array
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
                'id' => 'primary',
            )
        )
    ),
    // List
    'list'     => array
    (
        'sorting'           => array
        (
            'disableGrouping'=> true,
            'mode'        => 1,
            'fields'      => array('title'),
            'panelLayout' => 'filter,search,limit',
        ),
        'label'             => array(
            'fields' => array('title', 'published'),
            'format' => '%s',
        ),
        'global_operations' => array
        (
            'all' => array
            (
                'label'      => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'       => 'act=select',
                'class'      => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"'
            )
        ),
        'operations'        => array
        (
            'edit'   => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_list']['edit'],
                'href'  => 'act=edit',
                'icon'  => 'edit.gif'
            ),
            'delete' => array
            (
                'label'      => &$GLOBALS['TL_LANG']['tl_list']['delete'],
                'href'       => 'act=delete',
                'icon'       => 'delete.gif',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm']
                                . '\'))return false;Backend.getScrollOffset()"'
            ),
            'show'   => array
            (
                'label' => &$GLOBALS['TL_LANG']['tl_list']['show'],
                'href'  => 'act=show',
                'icon'  => 'show.gif'
            )
        )
    ),
    // Palettes
    'palettes' => array(
        'default' => '{item_legend},title,description'
    ),
    // Fields
    'fields'   => array
    (
        'id'          => array
        (
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ),
        'tstamp'      => array
        (
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ),
        'title'       => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_list']['title'],
            'search'    => true,
            'exclude'   => true,
            'inputType' => 'text',
            'eval'      => array('tl_class' => 'w50', 'maxlength' => 255, 'mandatory' => true),
            'sql'       => "varchar(255) NOT NULL default ''"
        ),
        'description' => array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_list']['description'],
            'exclude'   => true,
            'inputType' => 'textarea',
            'eval'      => array('tl_class' => 'clr lng', 'rte' => 'tinyMCE'),
            'sql'       => "mediumtext NULL"
        ),
    )
);
