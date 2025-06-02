<?php

ini_set('display_errors', 1);

// $startMyFramework = microtime(true);

if(PHP_MAJOR_VERSION < 8) {
    die('Require PHP version >= 8');
}

require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'application'.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'config.php';

require_once APPLICATION.'bootstrap.php';