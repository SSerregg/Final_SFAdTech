<?php

class Model_UnsubscribeWebMaster extends Model
{
    protected static function stmt ($db, $offerID, $webMaster) {

        $stmt = $db->prepare('DELETE FROM subscriptions WHERE id_offer=? AND webmaster=?');
        $stmt->bindParam(1, $offerID);
        $stmt->bindParam(2, $webMaster);
    
        $stmt->execute();
        } 

    protected static function deleteSubscribe () {

        $offerID  =    $_POST['id'];
        $webMaster=   $_SESSION['username'];

        if($_POST['key'] == $_SESSION['key']){

            $db   = Model::connect();
            self::stmt($db, $offerID, $webMaster);
            header ('Location:/WebMaster');
        } else {
            header ('Location:/ExitFrom');
         }
    }
}