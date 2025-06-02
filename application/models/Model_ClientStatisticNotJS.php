<?php

namespace Application\models;

use Application\core\Model;
use \PDO;
use \PDOException;

//require_once MODELS.'Model_ClientStatistic.php';

class Model_ClientStatisticNotJS extends Model_ClientStatistic{

    public static function standart(){
    
         $result_count_redirect = self::universal(); 
        return $result_count_redirect;
    }
}