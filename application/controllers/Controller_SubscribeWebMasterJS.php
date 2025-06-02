<?php

namespace Application\controllers;

use Application\models\Model_SubscribeWebMasterJS;

class Controller_SubscribeWebMasterJS extends Model_SubscribeWebMasterJS {

    function index(){

        static::creareSubscribe();

        exit();
    }


}