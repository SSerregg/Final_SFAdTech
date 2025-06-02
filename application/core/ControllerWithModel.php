<?php

namespace Application\core;


class ControllerWithModel{

    protected $data;
    protected $view;
    
    

    public function __construct($model){
        
        $nameSpace = 'Application\models\\'.$model;
        $this->data = $nameSpace::standart();

        $this->view = new View();
    }
}