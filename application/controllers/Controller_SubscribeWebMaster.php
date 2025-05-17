<?php


class Controller_SubscribeWebMaster extends Model_SubscribeWebMaster {

    function index(){

        static::creareSubscribe();

        exit();
    }


}