<?php

namespace Application\controllers;

use Application\models\Model_ClientStatistic;

class Controller_ClientStatistic extends Model_ClientStatistic
{

    function index(){

        static::ClientStatistic();
        
    }

}