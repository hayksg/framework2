<?php

// Front Controller

// Setings
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Include configuration files
define('ROOT', __DIR__ . '/../');
require_once(ROOT . 'Components/Router.php');
require_once(ROOT . 'Components/DB.php');

// DB connection

// Router's invoke
(new Router())->run();