<?php


error_reporting(E_ALL);

//require_once __DIR__ . '/oldSchool.autoload.php';

//define('ROOT', dirname(__FILE__));

require_once  __DIR__ . '/lib/Arrays.php';
require_once  __DIR__ . '/lib/Database.php';
require_once  __DIR__ . '/lib/Sessions.php';

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/core/Router.php';


$router = new Router();
$router->init();






