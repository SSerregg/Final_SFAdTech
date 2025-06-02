<?php

session_start();
require_once ROOT.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
//require_once ROOT.'bd'.DIRECTORY_SEPARATOR.'BD_Config.php'; 
//include_once CORE.'Model.php'; 
//require_once CORE.'Controller.php';
//require_once CORE.'ControllerWithModel.php';
//require_once CORE.'View.php';
//require_once CORE.'Route.php'; 


Application\core\Route::start();