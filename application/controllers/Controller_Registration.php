<?php

namespace Application\controllers;

use Application\models\Model_Registration;

class Controller_Registration extends Model_Registration {

    function index(){

        static::Registration();
        header ('Location:/');
        exit();
    }


}