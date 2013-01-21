<?php

namespace \Helper;

class ArrayHelper
{
    public static function varsToArray($assoc = false)
    {
        $ret = array();
        $vars = func_get_args();
        foreach ($vars as $var) {
            if ($assoc)
                $ret[$$var] = $var;
            else
                $ret[] = $var;
        }
        return $ret;
    }
    
}