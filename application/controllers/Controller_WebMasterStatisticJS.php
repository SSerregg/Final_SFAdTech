<?php

namespace Application\controllers;

use Application\models\Model_WebMasterStatisticJS;

class Controller_WebMasterStatisticJS extends Model_WebMasterStatisticJS {

    function index(){
    
        if(!empty($_SESSION['username']) && $_SESSION['role'] === 'webmaster'){
    
            static::statistic();
            exit();
    
        } 
    }
    }