<?php

namespace Application\models;
use \PDO;
use \PDOException;

class Model_ExitFrom
{
    protected static function exitFrom(){

        session_unset();
        session_destroy();
        header ('Location:/');
        exit();
    }
}