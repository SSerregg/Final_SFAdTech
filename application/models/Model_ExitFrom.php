<?php



class Model_ExitFrom
{
    protected static function exitFrom(){

        session_unset();
        session_destroy();
        header ('Location:/');
        exit();
    }
}