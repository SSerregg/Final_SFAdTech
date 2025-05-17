<?php


class Controller_Registration extends Model_Registration {

    function index(){

        static::Registration();
        header ('Location:/');
        exit();
    }


}