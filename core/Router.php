<?php
/**
 * Created by PhpStorm.
 * User: Sich
 * Date: 12/12/2017
 * Time: 10:46 AM
 */

class Router extends Arrays
{
    public static $routes;

    public function __construct()
    {
        $controllersRout = '/config/config.php';
        self:: $routes = include($controllersRout);
    }


    public function init()
    {
        $parts = self:: prepareUrlToParts();

        $controller = self:: prepareControllerFileName(parent:: getArrayValue($parts, 0, 'index'));

        $controllersRout = parent:: getFromConfig('controllersDir');
        $controllerFile = "{$controllersRout}/{$controller}" . ".php";

        if (!file_exists($controllerFile)) {
            die('Controller is not exists');
        }
        require_once $controllerFile;

        $action = self:: prepareActionFunctionName(parent:: getArrayValue($parts, 1, 'index'));;

        $controllerObject = new $controller;
        $result = $controllerObject->$action();

    }

    private function prepareActionFunctionName($urlPart)
    {
        return 'action' . parent:: camelizeString($urlPart);
    }

    private function prepareUrlToParts()
        {
            $url = trim($_SERVER['REQUEST_URI'], " \t\n\r\0\x0B/");
            $getParamsStart = strpos($url, '?');

            if (false !== $getParamsStart) {
                $url = substr($url, 0, $getParamsStart);
            }
            return array_filter(explode('/', $url));
        }

    private function prepareControllerFileName($urlPart)
    {

        return parent:: camelizeString($urlPart) . 'Controller';
    }

}