<?php

namespace Application\controllers;

use Application\core\ControllerWithModel;

class Controller_Client extends ControllerWithModel {

function index(){

    if(!empty($_SESSION['username']) && $_SESSION['role'] === 'advertiser'){

        $this->view->render('pageClient.php', 'template_view_client.php', $this->data);
        exit();

    } else { 
        header ('Location:/');
    }
}
function bypass(){

    if(!empty($_SESSION['username']) && $_SESSION['role'] === 'advertiser'){

        $this->view->render('pageClientWithuotJS.php', 'template_view.php', $this->data);
        exit();

    } else { 
        header ('Location:/');
    }
}
}