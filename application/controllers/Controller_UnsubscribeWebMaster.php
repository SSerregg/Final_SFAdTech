<?php


class Controller_UnsubscribeWebMaster extends Model_UnsubscribeWebMaster {

    function index(){

        static::deleteSubscribe();

        exit();
    }


}