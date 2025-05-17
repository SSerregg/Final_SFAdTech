<?php


class View{
    public function render($content_view, $template_view=null, $data = null){
        if($template_view){
            include_once '../application/views/'.$template_view;
        }
    }
}

