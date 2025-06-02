<?php

namespace Application\models;

use Application\core\Model;
use \PDO;
use \PDOException;

class Model_Registration extends Model
{
    protected static function stmt ($db, $username, $hashedPass, $rolestatus) {

        $stmt = $db->prepare("INSERT INTO users (user, pass, rolestatus) VALUES (?, ?, ?)");
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $hashedPass);
        $stmt->bindParam(3, $rolestatus);
        $stmt->execute();
        } 

    protected static function Registration(){

        if(!empty($_POST['username']) && !empty($_POST['password'])&& !empty($_POST['role'])){

            $username = (string) $_POST['username'];
            $hashedPass = md5((string)$_POST['password']."HAYTHERE");
            $rolestatus = (string) $_POST['role'];
        
            $db = Model::connect();
            
            try{
        
                self::stmt($db, $username, $hashedPass, $rolestatus);
            
            }catch(PDOException){
        
                $criate = $db->prepare("CREATE TABLE users (
                    id INT PRIMARY KEY AUTO_INCREMENT , 
                    user character varying(30) , 
                    pass character varying(55) , 
                    rolestatus character varying(20) ,
                    KEY own (user)
                  );");
                $criate->execute();
            
                self::stmt($db, $username, $hashedPass, $rolestatus);
            }
        }
    }
}
