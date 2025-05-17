<?php

session_start();
require_once '../vendor/autoload.php';
require_once '../bd/BD_Config.php'; 
include_once '../application/core/Model.php'; 
require_once '../application/core/Controller.php';
require_once '../application/core/ControllerWithModel.php';
require_once '../application/core/View.php';
require_once '../application/core/Route.php'; 


Route::start();