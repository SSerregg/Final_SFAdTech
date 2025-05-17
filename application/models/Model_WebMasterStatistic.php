<?php

class Model_WebMasterStatistic extends Model 
{
    public static function standart()
    {
        if(!empty($_POST['offer'])){
        $db = Model::connect();

        $data_start  =  $_POST['trip_start'];
        $data_finish = $_POST['trip_finish'];
        $id_offer    =       $_POST['offer'];
        $web_master  = $_SESSION['username'];

        $stmt = $db->prepare('SELECT COUNT(*) AS count FROM redirect WHERE ? <= nowdate AND ? >= nowdate 
        AND ? = webmaster AND ? = idoffer');
        $stmt ->bindParam(1, $data_start);
        $stmt ->bindParam(2, $data_finish);
        $stmt ->bindParam(3, $web_master);
        $stmt ->bindParam(4, $id_offer);
        $stmt ->execute();

        $result_count_redirect = $stmt->FETCH(PDO::FETCH_ASSOC); 


        $stmt2 = $db->prepare('SELECT costing FROM subscriptions WHERE ? = webmaster AND ? = id_offer');
        $stmt2 ->bindParam(1, $web_master);
        $stmt2 ->bindParam(2, $id_offer);
        $stmt2 ->execute();

        $result_cost_offer = $stmt2->FETCH(PDO::FETCH_ASSOC); 

        $sum_cost_offer = $result_count_redirect['count'] * $result_cost_offer['costing'];

        return [$result_count_redirect, $sum_cost_offer];
        } else {
            header ('Location:/WebMaster');
            exit();
        }

    }
}