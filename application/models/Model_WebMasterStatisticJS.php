<?php

class Model_WebMasterStatisticJS extends Model 
{
    public static function statistic()
    {
     
        $db = Model::connect();

        $data_start  =    $_GET['dateStart'];
        $data_finish =   $_GET['dateFinish'];
        $id_offer    =     $_GET['selector'];
        $web_master  = $_SESSION['username'];

        $stmt = $db->prepare('SELECT COUNT(*) AS count FROM redirect WHERE ? <= nowdate AND ? >= nowdate 
        AND ? = webmaster AND ? = idoffer');
        $stmt ->bindParam(1, $data_start);
        $stmt ->bindParam(2, $data_finish);
        $stmt ->bindParam(3, $web_master);
        $stmt ->bindParam(4, $id_offer);
        $stmt ->execute();

        $result_count_redirect = $stmt->FETCH(PDO::FETCH_ASSOC); 


        $stmt2 = $db->prepare('SELECT costing FROM subscriptions WHERE ? = web_master AND ? = id_offer');
        $stmt2 ->bindParam(1, $web_master);
        $stmt2 ->bindParam(2, $id_offer);
        $stmt2 ->execute();

        $result_cost_offer = $stmt2->FETCH(PDO::FETCH_ASSOC); 

        $sum_cost_offer = $result_count_redirect['count'] * $result_cost_offer['costing'];

        $array = [$result_count_redirect['count'], $sum_cost_offer];

        $array_front = json_encode($array);

        echo $array_front;
    }
}