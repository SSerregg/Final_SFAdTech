<?php

class Model_Admin 
{
    public static function standart()
    {

        $nyy= file_get_contents('../logs/logRef.txt');
        $rfv = str_replace("[]","<br>",$nyy);
        return $rfv;
    }
}