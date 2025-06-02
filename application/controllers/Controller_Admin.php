<?php

namespace Application\controllers;

use Application\core\ControllerWithModel;

class Controller_Admin  extends ControllerWithModel
{

function index(){

    if(!empty($_SESSION['username']) && $_SESSION['role'] === 'admin'){

         $this->view->render('pageAdmin.php', 'template_view.php', $this->data);
         exit();

    } else { 
        header ('Location:/');
    }
}
}