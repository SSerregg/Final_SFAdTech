<?php

namespace Application\controllers;

use Application\models\Model_ExitFrom;

class Controller_ExitFrom extends Model_ExitFrom 
{

    function index(){

        static::exitFrom();
        
    }


}