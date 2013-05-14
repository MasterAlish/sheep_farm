<?php

class TemplateProcessor {
    private  $smarty;

    private function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->template_dir = 'templates/';
        $this->smarty->compile_dir = 'smarty/templates_c';
        $this->smarty->config_dir = 'smarty/configs';
        $this->smarty->cache_dir = 'smarty/cache';
    }
    private function __clone(){}

    public static function getTemplateProcessor(){
        return new self;
    }

    public function assign($name,$value){
        $this->smarty->assign($name,$value);
    }

    public function display($template){
        $this->smarty->assign('template',$template);
        $this->smarty->display("main.tpl");
    }
}
