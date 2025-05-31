<?php


class Controller_AdminForUnsubscribe extends Model_AdminForUnsubscribe
{

    function index(){

        static::unSubscribe();
        
    }

}