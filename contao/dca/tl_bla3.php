<?php
$GLOBALS['TL_DCA']['bla3'] = array
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
       
        'timed'      =>array
        (
            'label'     => &$GLOBALS['TL_LANG']['tl_bla3']['timed'],
            'search'    => true,
            'exclude'   => true,
            'inputType' => 'TIME',
            'eval'      => array('tl_class' => 'w50', 'maxlength' => 255, 'mandatory' => true),
            'sql'       => "TIME"
            
        )
        
    )
);

