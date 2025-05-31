<?php

class Model_UnsubscribeWebMaster extends Model
{
    protected static function stmt ($db, $offerID, $webMaster) {

        $stmt = $db->prepare('DELETE FROM subscriptions WHERE id_offer=? AND web_master=?');
        $stmt->bindParam(1, $offerID);
        $stmt->bindParam(2, $webMaster);
    
        $stmt->execute();
        } 

    protected static function countCraftmens($db, $offerID){

        $stmt = $db->prepare('SELECT `craftsmen` FROM `offers` WHERE  id=?');
        $stmt ->bindParam(1, $offerID);
        $stmt ->execute();
        $result = $stmt->FETCH(PDO::FETCH_ASSOC);

        $mes_count = $result['craftsmen'] - 1;
        $stmt_update = $db->prepare("UPDATE `offers` SET `craftsmen`=$mes_count WHERE  `id`=?");
        $stmt_update ->bindParam(1, $offerID);
        $stmt_update ->execute();
    }

    protected static function deleteSubscribe () {

        $offerID  =    $_POST['id'];
        $webMaster=   $_SESSION['username'];

        if($_POST['key'] == $_SESSION['key']){

            $db   = Model::connect();
            self::stmt($db, $offerID, $webMaster);

            self::countCraftmens($db, $offerID);

            header ('Location:/WebMaster');
        } else {
            header ('Location:/ExitFrom');
         }
    }

    protected static function deleteSubscribeJS () {

        $offerID  =    $_GET['id'];
        $webMaster=   $_SESSION['username'];

        $db   = Model::connect();

            self::stmt($db, $offerID, $webMaster);

            self::countCraftmens($db, $offerID);

            echo $offerID;
    }
}