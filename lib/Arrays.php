<?php
/**
 * Created by PhpStorm.
 * User: Sich
 * Date: 12/12/2017
 * Time: 11:28 AM
 */

class Arrays
{
    public static function getArrayValue(array $array, $key, $default = null)
    {
        $parts = explode('.', $key);

        foreach ($parts as $part) {
            if (is_array($array) && array_key_exists($part, $array)) {
                $array = $array[$part];
            } else {
                return $default;
            }
        }

        return $array;
    }

    public static function getFromConfig($key, $default = null)
    {
        return (self:: getArrayValue(Router:: $routes, $key, $default));
    }

    public static function camelizeString($string, $delimiter = '-')
    {
        $result = '';
        foreach (explode($delimiter, $string) as $part) {
            $result .= ucfirst(strtolower($part));
        }
        return $result;
    }
}

