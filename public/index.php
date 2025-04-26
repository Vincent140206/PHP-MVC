<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('BASE_URL', '/MVC Sederhana/public');

require_once '../core/Router.php';
require_once '../core/Controller.php';
require_once '../core/Model.php';

$router = new Router();
$router->route();
