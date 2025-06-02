<?php

namespace Application\models;

use Application\core\Model;
use \PDO;
use \PDOException;

class Model_SubscribeWebMasterJS extends Model
{
    protected static function stmt ($db, $offerID, $uLink, $webMaste, $uProcent) {

        $stmt = $db->prepare("INSERT INTO subscriptions (id_offer, link, web_master, costing) VALUES (?, ?, ?, ?)");
        $stmt->bindParam(1, $offerID);
        $stmt->bindParam(2, $uLink);
        $stmt->bindParam(3, $webMaste);
        $stmt->bindParam(4, $uProcent);
    
        $stmt->execute();
        } 

    protected static function creareSubscribe () {

        $post = key($_POST);
        $array_post = json_decode($post, true);

         $offerID  =$array_post['post_id'];
    
         $webMaster=   $_SESSION['username'];

      
        if($array_post['post_key'] !== $_SESSION['key']){
             return;
        }

        $db   = Model::connect();

         $stmt = $db->prepare('SELECT * FROM `offers` WHERE  id=?');
         $stmt ->bindParam(1, $offerID);
         $stmt ->execute();
         $result = $stmt->FETCH(PDO::FETCH_ASSOC);

         $uProcent = $result['cost'] * 80 / 100;

         if(!empty($_POST['followCost'])){
             $costing  = $_POST['followCost'] * $result['cost'] / 100;
             $maxCosting = $result['cost'] * 90 / 100;

             if ($costing < $maxCosting && $costing > 0){
                 $uProcent = $costing;              
             }
         } 

         $uLink = 'sf-adtech-php-53/<br>Redirect?id='.$offerID.'&wMaster='.$webMaster;


         try{

             self::stmt($db, $offerID, $uLink, $webMaster, $uProcent);
        
         }catch(PDOException){
    
            $criate = $db->prepare("CREATE TABLE subscriptions (
                id INT PRIMARY KEY AUTO_INCREMENT , 
                id_offer INT NOT NULL , 
                link character varying(255) ,
                web_master character varying(30) ,
                costing FLOAT(10,3) UNSIGNED ,
                FOREIGN KEY (id_offer) REFERENCES offers(id)
              );");
            $criate->execute();

            self::stmt($db, $offerID, $uLink, $webMaster, $uProcent);
            } 

            $mes_count = $result['craftsmen'] + 1;
            $id_res    = $result['id'];

        $stmt_update = $db->prepare("UPDATE `offers` SET `craftsmen`=$mes_count WHERE  `id`=$id_res");
        $stmt_update ->execute();

        $array_front = [$offerID, $uLink, $uProcent];
        $array_to_front = json_encode($array_front);
        echo $array_to_front;
      } 
    }
