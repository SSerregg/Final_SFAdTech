<?php

namespace Application\controllers;

use Application\models\Model_AdminForUnsubscribe;

class Controller_AdminForUnsubscribe extends Model_AdminForUnsubscribe
{

    function index(){

        static::unSubscribe();
        
    }

}