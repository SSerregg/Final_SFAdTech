<?php

class Model_WebMaster extends Model 
{
    public static function standart()
    {
        $db = Model::connect();

        try{
        $stmt = $db->prepare('SELECT * FROM `offers` WHERE  topicstate=1');

        $stmt->execute();

        $result = $stmt->FetchAll(PDO::FETCH_ASSOC); 

        } catch(PDOException){

        $result = null;
        }

        try{  
            $stmtSub = $db->prepare('SELECT * FROM subscriptions WHERE  webmaster=?');
            $stmtSub->bindParam(1, $_SESSION['username']);
            
            $stmtSub->execute();
    
            $resultSub = $stmtSub->FetchAll(PDO::FETCH_ASSOC);
    
            } catch(PDOException){
    
            $resultSub = null;
            }

        return [$result, $resultSub];

    }
}