<?php


class Controller_WebMaster extends ControllerWithModel {

function index(){

    if(!empty($_SESSION['username']) && $_SESSION['role'] === 'webmaster'){

        $this->view->render('pageWebMaster.php', 'template_view.php', $this->data);
        exit();

    } else { 
        header ('Location:/');
    }
}
}