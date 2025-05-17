<?php


class Controller_Test extends Controller {

function index(){

    $this->view->render('pageTest.php', 'template_view.php');
}
}