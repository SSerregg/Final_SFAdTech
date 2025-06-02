<?php

namespace Application\controllers;

use Application\models\Model_Autorization;

class Controller_Autorization extends Model_Autorization 
{

    function index(){

        static::Autorization();
        
        exit();
    }


}