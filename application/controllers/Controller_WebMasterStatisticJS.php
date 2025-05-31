<?php


class Controller_WebMasterStatisticJS extends Model_WebMasterStatisticJS {

    function index(){
    
        if(!empty($_SESSION['username']) && $_SESSION['role'] === 'webmaster'){
    
            static::statistic();
            exit();
    
        } 
    }
    }