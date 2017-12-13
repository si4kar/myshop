<?php
/**
 * Created by PhpStorm.
 * User: Sich
 * Date: 12/13/2017
 * Time: 11:30 AM
 */

class Database extends Arrays
{
    public static $dbConnect = null;


    public function getDbConnection()
    {
        if (null === self:: $dbConnect) {
            $config = parent:: getFromConfig('db');

            $host = parent:: getArrayValue($config, 'host');
            $user = parent:: getArrayValue($config, 'user');
            $password = parent:: getArrayValue($config, 'password');
            $dbName = parent:: getArrayValue($config, 'db_name');

            $dbConnect = @mysqli_connect($host, $user, $password, $dbName) or die('DB connection error');
        }
        return self:: $dbConnect;
    }


    public function renderTemplate($template, array $variables = [])
    {
        $viewsDir = parent:: getFromConfig('viewsDir');
        $templateFile = "{$viewsDir}/{$template}.php";
        if (!file_exists($templateFile)) {
            die("Template '{$template}' is not exists");
        }

        extract($variables);

        ob_start();
        require_once $templateFile;
        $content = ob_get_clean();

        $layoutFile = "{$viewsDir}/layouts/main.php";
        if (!file_exists($layoutFile)) {
            die("Layout 'layouts/main' is not exists");
        }

        ob_start();
        require_once $layoutFile;
        return ob_get_clean();
    }
}