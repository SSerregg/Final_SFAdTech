<?php

namespace Application\models;

use Application\core\Model;
use \PDO;
use \PDOException;

class Model_Admin extends Model 
{
    public static function standart()
    {
        $db = Model::connect();
        $stmt1 = $db->prepare('SELECT nowdate, webmaster, offer, cost, COUNT(*) AS count
        FROM `redirect`JOIN offers ON redirect.idoffer = offers.id 
        LEFT JOIN subscriptions ON redirect.idoffer = subscriptions.id_offer GROUP BY nowdate, webmaster, offer, cost');

        $stmt1   ->execute();
        $result1 = $stmt1->FetchAll(PDO::FETCH_ASSOC); 

        $stmt2 = $db->prepare('SELECT SUM(cost) AS expenses, SUM(costing) AS summ
        FROM `redirect`JOIN offers ON redirect.idoffer = offers.id 
        LEFT JOIN subscriptions ON redirect.idoffer = subscriptions.id_offer');

        $stmt2   ->execute();
        $result2 = $stmt2->FETCH(PDO::FETCH_ASSOC); 


        $stmt3 = $db->prepare('SELECT * FROM subscriptions');
        $stmt3   ->execute();
        $result3 = $stmt3->FetchAll(PDO::FETCH_ASSOC); 

        $refusal = file_get_contents('../logs/logRef.txt');
        $reviews_refusal = str_replace("[]","<br>",$refusal);

        $stmt4 = $db->prepare('SELECT id, offer, topicstate FROM offers');
        $stmt4   ->execute();
        $result4 = $stmt4->FetchAll(PDO::FETCH_ASSOC); 

        $parametr = 'webmaster';
        $stmt5 = $db->prepare('SELECT user FROM users WHERE `rolestatus`=?');
        $stmt5 ->bindParam(1, $parametr);
        $stmt5 ->  execute();
        $result5 = $stmt5->FetchAll(PDO::FETCH_ASSOC);

         return [$reviews_refusal, $result1, $result3, $result2, $result4, $result5];
    }
}