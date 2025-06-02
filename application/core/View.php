<?php

namespace Application\core;

class View{
    public function render($content_view, $template_view=null, $data = null){
        if($template_view){
            include_once VIEWS.$template_view;
        }
    }
}

