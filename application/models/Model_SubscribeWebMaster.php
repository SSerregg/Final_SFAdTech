<?php

namespace Application\models;

use Application\core\Model;
use \PDO;
use \PDOException;

class Model_SubscribeWebMaster extends Model
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

        $offerID  =    $_POST['id'];
        if($_SESSION['role']==='webmaster'){
        $webMaster=   $_SESSION['username'];

        if($_POST['key'] !== $_SESSION['key']){
            return;
        }
        $db   = Model::connect();
    }elseif($_SESSION['role']==='admin'){
        $webMaster = $_POST['webMaster'];
        $db   = Model::connect();
        $stmt_check = $db->prepare('SELECT * FROM `subscriptions` WHERE  id_offer=? AND web_master=?');
        $stmt_check ->bindParam(1, $offerID);
        $stmt_check ->bindParam(2, $webMaster);
        $stmt_check ->execute();
        $result_check = $stmt_check->FETCH(PDO::FETCH_ASSOC);
        print_r($result_check);
        if(!empty($result_check)){
            header ('Location:/Admin');
            exit();
        }
    }

         
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

if($_SESSION['role']==='webmaster'){
        header ('Location:/WebMaster');
        exit();
}elseif($_SESSION['role']==='admin'){
        header ('Location:/Admin');
        exit();
    }
      } 
    }
