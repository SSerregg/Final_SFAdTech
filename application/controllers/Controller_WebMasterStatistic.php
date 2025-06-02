<?php

namespace Application\controllers;

use Application\core\ControllerWithModel;

class Controller_WebMasterStatistic extends ControllerWithModel {

    function index(){
    
        if(!empty($_SESSION['username']) && $_SESSION['role'] === 'webmaster'){
    
            $this->view->render('pageWebMasterStatistic.php', 'template_view.php', $this->data);
            exit();
    
        } else { 
            header ('Location:/');
        }
    }
    }