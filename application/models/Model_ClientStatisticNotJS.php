<?php

require_once '../application/models/Model_ClientStatistic.php';

class Model_ClientStatisticNotJS extends Model_ClientStatistic{

    public static function standart(){
    
         $result_count_redirect = self::universal(); 
        return $result_count_redirect;
    }
}