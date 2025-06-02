<?php

namespace Application\models;

use Application\core\Model;

use \PDO;
use \PDOException;

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Model_Redirect extends Model
{
    protected static function stmt ($db, $idOffer, $webMaster) {

        $stmt = $db->prepare("INSERT INTO redirect (idoffer, webmaster) VALUES (?, ?)");
        $stmt->bindParam(1, $idOffer);
        $stmt->bindParam(2, $webMaster);
        $stmt->execute();
        } 

    protected static function Redirect()
    {

 
        if(!empty($_GET['id']) && !empty($_GET['wMaster'])){

            $idOffer = $_GET['id'];
            $db = Model::connect();
            $webMaster = $_GET['wMaster'];

                //1 Проверяем, что веб-мастер подписан на offer:
                $stmtCheck = $db->prepare('SELECT * FROM subscriptions WHERE  id_offer=? && web_master=?');
                $stmtCheck ->bindParam(1, $idOffer);
                $stmtCheck ->bindParam(2, $webMaster);
                $stmtCheck ->execute();
                $resultCheck = $stmtCheck->FETCH(PDO::FETCH_ASSOC);  

                if(!$resultCheck){

                    $logger_reflection = new Monolog\Logger('LOGGER');
                    $logger_reflection->pushHandler(new StreamHandler('../logs/logRef.txt', Logger::NOTICE));
                    $logger_reflection->notice('WebMaster: '.$webMaster, array('offerID' => $idOffer));
                    return;
                }
                //1  

            $cookii = $_COOKIE['lock'] ?? null;

            if($cookii != $idOffer){

            try {

                self::stmt ($db, $idOffer, $webMaster);

            } catch(PDOException){

                $criate = $db->prepare("CREATE TABLE redirect (
                    id INT PRIMARY KEY AUTO_INCREMENT , 
                    nowdate DATE DEFAULT (CURRENT_DATE) , 
                    idoffer INT NOT NULL ,
                    webmaster character varying(30) ,
                    FOREIGN KEY (idoffer) REFERENCES offers(id) 
         
                  );");
                $criate->execute();
                self::stmt ($db, $idOffer, $webMaster);
            }

            $arr_cookie_options = array (
                'expires' => time() + 60*60*24*365, 
                'httponly' => true    // or false
                );
                setcookie('lock', $idOffer, $arr_cookie_options); 
            }

            $stmt = $db->prepare('SELECT targeturl FROM `offers` WHERE  id=?');
            $stmt ->bindParam(1, $idOffer);
            $stmt ->execute();
            
            $result = $stmt->FETCH(PDO::FETCH_ASSOC);

            if(!empty($_SERVER['REMOTE_ADDR'])){
                $ip = $_SERVER['REMOTE_ADDR'];
            } elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else {
                $ip = 'unkown';
            }

            if(!empty($_SERVER['HTTP_USER_AGENT'])){
                $userAgent = $_SERVER['HTTP_USER_AGENT'];
            } else {
                $userAgent = 'unkown';
            }

            $stmt2 = $db->prepare('SELECT id FROM redirect WHERE  idoffer=? && webmaster=? ORDER BY id DESC LIMIT 1');
            $stmt2 ->bindParam(1, $idOffer);
            $stmt2 ->bindParam(2, $webMaster);
            $stmt2 ->execute();
            $resultID = $stmt2->FETCH(PDO::FETCH_ASSOC);

            $logger = new Logger('LOGGER');
            $logger->pushHandler(new StreamHandler('../logs/log.txt', Logger::NOTICE));

            $logger->notice('Redirect id: '.$resultID['id'], array('ip' => $ip, 'agent' => $userAgent));

            header ('Location:'.$result['targeturl']);
            exit();
        } 
    }
}