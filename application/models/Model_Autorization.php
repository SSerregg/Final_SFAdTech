<?php

namespace Application\models;

use Application\core\Model;
use \PDO;
use \PDOException;

class Model_Autorization extends Model
{
    protected static function Autorization(){

        if(!empty($_POST['username']) && !empty($_POST['password'])){

            $username = (string) $_POST['username'];
            $hashedPass = md5((string)$_POST['password']."HAYTHERE");

            $db = Model::connect();

            $stmt = $db->prepare('SELECT * FROM `users` WHERE  `user`=? AND `pass`=?');

            $stmt->bindParam(1, $username);
            $stmt->bindParam(2, $hashedPass);
            $stmt->execute();
            $result = $stmt->FETCH(PDO::FETCH_ASSOC); 

            if(!empty($result)){
                $_SESSION['username'] = $result['user'];
                $_SESSION['role'] = $result['rolestatus'];

                if($result['rolestatus'] == 'advertiser'){
                    header ('Location:/Client');

                }elseif($result['rolestatus'] == 'webmaster'){
                    header ('Location:/WebMaster');

                }elseif($result['rolestatus'] == 'admin'){
                    header ('Location:/Admin');

                }else {
                header ('Location:/');
                }
            } else {
                header ('Location:/');
            }

        } else {
            header ('Location:/');
        }
    }
}