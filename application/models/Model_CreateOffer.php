<?php


class Model_CreateOffer extends Model
{
    protected static function stmt ($db, $offername, $followCost, $targetURL, $description, $owner) {

        $stmt = $db->prepare("INSERT INTO offers (offer, cost, targeturl, topic, ownername) VALUES (?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $offername);
        $stmt->bindParam(2, $followCost);
        $stmt->bindParam(3, $targetURL);
        $stmt->bindParam(4, $description);
        $stmt->bindParam(5, $owner);
    
        $stmt->execute();
        } 

    protected static function creareOffer () {

        $offername   = (string)   $_POST['offerName'];
        $followCost  =           $_POST['followCost'];
        $targetURL   = (string)   $_POST['targetURL'];
        $description = (string) $_POST['description'];
        $owner       =          $_SESSION['username'];

        $db = Model::connect();

        try{

            self::stmt($db, $offername, $followCost, $targetURL, $description, $owner);
        
        }catch(PDOException){
    
            $criate = $db->prepare("CREATE TABLE offers (
                id INT PRIMARY KEY AUTO_INCREMENT , 
                offer character varying(55) ,
                cost FLOAT(10,3) UNSIGNED , 
                targeturl character varying(55) ,
                ownername character varying(40) ,
                topic TEXT ,
                craftsmen tinyint UNSIGNED NULL DEFAULT 0 ,
                topicstate tinyint(1) NULL DEFAULT 1
              );");
            $criate->execute();
        
            self::stmt($db, $offername, $followCost, $targetURL, $description, $owner);
        }
    }
}