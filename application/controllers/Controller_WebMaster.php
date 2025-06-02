<?php

namespace Application\controllers;

use Application\core\ControllerWithModel;

class Controller_WebMaster extends ControllerWithModel {

function index(){

    if(!empty($_SESSION['username']) && $_SESSION['role'] === 'webmaster'){

        $this->view->render('pageWebMaster.php', 'template_view_webmaster.php', $this->data);
        exit();

    } else { 
        header ('Location:/');
    }
}
function bypass(){

    if(!empty($_SESSION['username']) && $_SESSION['role'] === 'webmaster'){

        $this->view->render('pageWebMasterNotJS.php', 'template_view.php', $this->data);
        exit();

    } else { 
        header ('Location:/');
    }
}
}