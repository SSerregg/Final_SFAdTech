<?php

namespace Application\controllers;

use Application\models\Model_ActiveOffer;

class Controller_ActiveOffer extends Model_ActiveOffer {

    function index(){

        static::deactivateOffer();
        //header ('Location:/Client');
        //exit();
    }


}