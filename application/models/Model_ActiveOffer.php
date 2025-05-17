<?php


class Model_ActiveOffer extends Model
{
    protected static function deactivateOffer(){

        $db        =    Model::connect();

        $id        =    $_POST['id'] ?? $_GET['id'];
        $ownerName =    $_SESSION['username'];
        $forState  =    $_POST['state'] ?? $_GET['state'];

        if($forState==1){
            $state = 0;
        } elseif ($forState==0) {
            $state = 1;
        } else {
           echo 'error'; 
           exit();
        }

        $stmt = $db->prepare("UPDATE `offers` SET `topicstate`=$state WHERE  `id`=? AND `ownername`= ?");
        $stmt ->bindParam(1, $id);
        $stmt ->bindParam(2, $ownerName);
        $stmt ->execute();

        if(isset($_POST['id']) && isset($_POST['state'])){

                    header ('Location:/Client');
                    exit();
        }
    }
}