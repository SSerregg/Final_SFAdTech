<?php


class Controller_Autorization extends Model_Autorization 
{

    function index(){

        static::Autorization();
        
        exit();
    }


}