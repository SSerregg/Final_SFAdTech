<?php


class Controller_First extends Controller {

    function index(){

        if(empty($_SESSION['username'])){
            $this->view->render('pageFirst.php', 'template_view.php');
            exit();
        } else {

            if($_SESSION['role']==='advertiser'){
                header ('Location:/Client');
            } elseif ($_SESSION['role']==='webmaster'){
                header ('Location:/WebMaster');
            } elseif ($_SESSION['role']==='admin'){
                header ('Location:/ExitFrom');
            } else {
                header('HTTP/1.1 404 Not Found');
            }
        }
    }

    function registration(){

        $this->view->render('pageRegistration.php', 'template_view.php');
        exit();
    }
}



