<?php


class Controller_ClientStatisticNotJS extends ControllerWithModel
{

    function index(){
   
            if(!empty($_SESSION['username']) && $_SESSION['role'] === 'advertiser'){

        $this->view->render('pageClientStatisticNotJS.php', 'template_view.php', $this->data);
        exit();

    } else { 
        header ('Location:/');
    }
        
    }


}