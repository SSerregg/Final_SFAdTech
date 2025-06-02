<?php

namespace Application\controllers;

use Application\models\Model_UnsubscribeWebMaster;

class Controller_UnsubscribeWebMaster extends Model_UnsubscribeWebMaster {

    function index(){

        static::deleteSubscribe();

        exit();
    }

    function unsub(){

        static::deleteSubscribeJS();

        exit();
    }


}