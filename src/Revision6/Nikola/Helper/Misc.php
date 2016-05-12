<?php
namespace Revision6\Nikola\Helper;
class Misc
{
    public function randomize() {
        $array = array();
        while(count($array) < 5) {
            $array[] = rand(1,10);
            $array = array_unique($array);
        }
        sort($array);
        return $array;
    }

}