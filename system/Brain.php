<?php

class Brain {
    public static function init(){
        session_start();
        ini_set('date.timezone', 'Asia/Bishkek');
        require_once('Smarty-3.1.13/libs/Smarty.class.php');
        require_once("system/TemplateProcessor.php");
        require_once("system/DatabaseProcessor.php");
        require_once("system/SheepFarm.php");
        self::checkLocale();
        self::getConfigs();
    }

    private static function getConfigs(){
        eval(file_get_contents('config.php'));
    }

    public static function process($tp){
        $url = $_SERVER['REQUEST_URI'];
        switch($url){
            case '/sheep/createDB':
                SheepFarm::initDB();
                header("location:/");
                break;
            default:
                if(strpos($url,'/sheep/refresh')===0) { SheepFarm::refresh(); break;}
                if(strpos($url,'/sheep/kill')===0) {SheepFarm::kill($_REQUEST['yard']); break;}
                if(strpos($url,'/sheep/console/kill')===0) {SheepFarm::killCommand(); break;}
                if(strpos($url,'/sheep/console/move')===0) {SheepFarm::moveCommand(); break;}
                if(strpos($url,'/sheep/console/create')===0) {SheepFarm::createCommand(); break;}
                break;
        }
        $tp->assign('commands',SheepFarm::getCommands());
        $tp->assign('help',SheepFarm::getHelp());

        if(!DatabaseProcessor::connected()) return;

        $tp->assign('lambs',SheepFarm::getSheepCollection());
    }

    public static function checkLocale(){
        if(empty($_SESSION['current_language'])){
            $_SESSION['current_language']='en';
        }
        if(!empty($_REQUEST['lang'])){
            if($_REQUEST['lang']=='ru')
                $_SESSION['current_language']='ru';
            else
                $_SESSION['current_language']='en';
        }
    }

    public static function finish(){
    }

}
