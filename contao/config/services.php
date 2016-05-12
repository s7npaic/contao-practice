<?php
/** @var Pimple $container */
$container = $GLOBALS['container'];

$container['misc'] = $container->share(function(){
    return new \Revision6\Nikola\Helper\Misc();
});