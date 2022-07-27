<?php

class XmlHelper {

    public static function hasDeclaration($str){
        return strpos($str, '<?xml') !== FALSE;
    }

    public static function getDeclaration($version = '1.0', $encoding = 'utf-8'){
        return '<?xml version="' . $version . '" encoding="' . $encoding . '"?>';
    }

    public static function appendDeclaration($str){
        if(!XmlHelper::hasDeclaration($str)) {
            $str = XmlHelper::declaration() . $str;
        }
        return $str;
    }

}
