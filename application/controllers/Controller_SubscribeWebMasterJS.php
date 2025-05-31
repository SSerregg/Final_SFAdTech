<?php


class Controller_SubscribeWebMasterJS extends Model_SubscribeWebMasterJS {

    function index(){

        static::creareSubscribe();

        exit();
    }


}