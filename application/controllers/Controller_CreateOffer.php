<?php

namespace Application\controllers;

use Application\models\Model_CreateOffer;

class Controller_CreateOffer extends Model_CreateOffer {

    function index(){

        static::creareOffer();
        header ('Location:/Client');
        exit();
    }

    function create(){
        static::create_offer_JS();
    }

}