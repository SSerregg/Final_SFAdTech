<?php


class ControllerWithModel{

    protected $data;
    protected $view;
    
    

    public function __construct($model){
        //$this->data = $model::index();
        $this->data = $model::standart();
        $this->view = new View();
    }
}