<?php


class Controller_Redirect extends Model_Redirect {

    function index(){

        static::Redirect();
        header('HTTP/1.1 404 Not Found');
    }


}