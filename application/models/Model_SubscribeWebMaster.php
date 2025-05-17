<?php


class Model_SubscribeWebMaster extends Model
{
    protected static function stmt ($db, $offerID, $uLink, $webMaste, $uProcent) {

        $stmt = $db->prepare("INSERT INTO subscriptions (id_offer, link, webmaster, costing) VALUES (?, ?, ?, ?)");
        $stmt->bindParam(1, $offerID);
        $stmt->bindParam(2, $uLink);
        $stmt->bindParam(3, $webMaste);
        $stmt->bindParam(4, $uProcent);
    
        $stmt->execute();
        } 

    protected static function creareSubscribe () {

        $offerID  =    $_POST['id'];
        $webMaster=   $_SESSION['username'];

        if($_POST['key'] == $_SESSION['key']){

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
                webmaster character varying(30) ,
                costing FLOAT(10,3) UNSIGNED ,
                FOREIGN KEY (id_offer) REFERENCES offers(id)
              );");
            $criate->execute();

            self::stmt($db, $offerID, $uLink, $webMaster, $uProcent);
            
      } 
        header ('Location:/WebMaster');
     } else {
        header ('Location:/ExitFrom');
     }
    }
}