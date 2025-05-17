<?php



class Model_ClientStatistic extends Model
{
    protected static function universal(){

        if(!empty($_GET['offer_id']) && !empty($_GET['data_start']) && !empty($_GET['data_finish'])){

        $db = Model::connect();

        $id_offer = $_GET['offer_id'];
        $data_start = $_GET['data_start'];
        $data_finish = $_GET['data_finish'];

        $stmt = $db->prepare('SELECT COUNT(*) AS count, SUM(cost) AS summ FROM redirect
        JOIN offers ON redirect.idoffer = offers.id 
        WHERE ? <= nowdate AND ? >= nowdate AND ? = idoffer');

        $stmt ->bindParam(1, $data_start);
        $stmt ->bindParam(2, $data_finish);
        $stmt ->bindParam(3, $id_offer);
        $stmt ->execute();

        $result_count_redirect = $stmt->FETCH(PDO::FETCH_ASSOC);
        return  $result_count_redirect;
        } 
    }

    protected static function ClientStatistic(){

        $result_count_redirect = self::universal(); 
        $json_count_redirect = json_encode($result_count_redirect);
        
        echo $json_count_redirect;   
    }

}