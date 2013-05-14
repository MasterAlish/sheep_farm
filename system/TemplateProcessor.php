<?php

class TemplateProcessor {
    private  $smarty;
    private $translations;

    private function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->template_dir = 'templates/';
        $this->smarty->compile_dir = 'smarty/templates_c';
        $this->smarty->config_dir = 'smarty/configs';
        $this->smarty->cache_dir = 'smarty/cache';
        $this->getLocalization();
    }
    private function __clone(){}

    public static function getTemplateProcessor(){
        return new self;
    }

    public function assign($name,$value){
        $this->smarty->assign($name,$value);
    }

    public function display($template){
        $this->assignAllWords();
        $this->smarty->assign('template',$template);
        $this->smarty->display("main.tpl");
    }

    private function assignAllWords(){
        $locale=array(
            'init_db'=> $this->getLocalizedString("Init DB"),
            'title'=> $this->getLocalizedString("Sheep farm"),
            'kill_all'=> $this->getLocalizedString("Kill all"),
            'yard'=> $this->getLocalizedString("Yard"),
            'refresh'=> $this->getLocalizedString("Refresh"),
            'incorrect_command'=> $this->getLocalizedString("Incorrect command"),
            'enter_command'=> $this->getLocalizedString("Enter command here"),
        );
        $this->smarty->assign("locale",$locale);
    }

    private function getLocalizedString($str){
        if(!empty($this->translations[$str]))
            return $this->translations[$str];
        return $str;
    }

    private function getLocalization(){
        $translations = array();
        eval(file_get_contents("templates/{$_SESSION['current_language']}/translations.php"));
        $this->translations=$translations;
    }
}
