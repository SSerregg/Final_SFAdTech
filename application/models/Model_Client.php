<?php

class Model_Client extends Model 
{
    public static function standart()
    {
        $db = Model::connect();

        try{
        $stmt = $db->prepare('SELECT * FROM `offers` WHERE  `ownername`=?');

        $stmt->bindParam(1, $_SESSION['username']);
        $stmt->execute();

        $result = $stmt->FetchAll(PDO::FETCH_ASSOC); 
        } catch(PDOException){

        $result = null;
        }

        return $result;

    }
}