<?php

namespace Application\controllers;

use Application\models\Model_SubscribeWebMaster;

class Controller_SubscribeWebMaster extends Model_SubscribeWebMaster {

    function index(){

        static::creareSubscribe();
        header ('Location:/ExitFrom');
        exit();
    }


}