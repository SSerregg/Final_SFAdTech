<?php
namespace Application\models;

use Application\core\Model;
use \PDO;
use \PDOException;

///require_once MODELS.'Model_UnsubscribeWebMaster.php';


class Model_AdminForUnsubscribe extends Model_UnsubscribeWebMaster{

protected static function unSubscribe () {

if(!empty($_POST['webmaster'])){
    $id_subscr = $_POST['webmaster'];
    $id_offers = array_key_last($_POST);

    $db   = Model::connect();

        $stmt = $db->prepare('DELETE FROM subscriptions WHERE id=?');
        $stmt ->bindParam(1, $id_subscr);
    
        $stmt ->execute();
       
self::countCraftmens($db, $id_offers);

header ('Location:/Admin');

} else{
    header ('Location:/Admin');
}
}
}