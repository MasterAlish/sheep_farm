<?php

class SheepFarm {
    public static function initDB(){
        GLOBAL $mysql;
        $dropDB="drop database If EXISTS farm";
        $createDB="create database {$mysql['db_name']};";
        $createTable="create table IF NOT EXISTS sheep(
                      id int primary key AUTO_INCREMENT,
                      yard int,
                      age int)";

        DatabaseProcessor::query($dropDB, false);
        DatabaseProcessor::query($createDB, false);

        DatabaseProcessor::query($createTable);
        self::randomSheeping();
    }

    public static function randomSheeping(){
        $lambs="";
        for($i=1; $i<=4;$i++){
            $count = rand(1,5);
            for($j=1; $j<$count;$j++){
                $age = rand(0,5);
                $lambs = "{$lambs}({$i},{$age}),";
            }
        }
        $lambs = "{$lambs}(1,1)";
        DatabaseProcessor::query("insert into `sheep`(`yard`,`age`) values {$lambs}");
    }

    public static function getSheepCollection(){
        $selectSheep = "select * from `sheep`";
        $result = DatabaseProcessor::query($selectSheep);
        $lambs = array(1=>array(),2=>array(),3=>array(),4=>array());
        if($result)
            foreach($result as $sheep)
                $lambs[$sheep['yard']][]=array('id'=>$sheep['id'],'age'=>$sheep['age']);
        return $lambs;
    }

    public static function growUpSheep(){
        $update = "update `sheep` set age=age+1";
        DatabaseProcessor::query($update);
    }

    public static function addNewGeneration($babies){
        $values="";
        foreach($babies as $yard=>$count){
            for($i=0;$i<$count;$i++)
                $values="({$yard},0),{$values}";
        }
        $values = substr($values,0,strlen($values)-1);
        $insert = "insert into `sheep`(`yard`,`age`) values {$values}";
        DatabaseProcessor::query($insert);
    }

    public static function reproduceSheep(){
        $YARD_CAPACITY = 55;
        function isMature($age){return $age>=10&&$age<=12;}
        function isYoungOrAdult($age){return $age>=5&&$age<10||$age>12&&$age<15;}

        $newGeneration=array(1=>0,2=>0,3=>0,4=>0);

        $sheep = self::getSheepCollection();
        foreach($sheep as $yard=>$lambs){
            if(count($lambs)>1)
            foreach($lambs as $lamb){
                if((count($lambs)+$newGeneration[$yard])>=$YARD_CAPACITY) break;

                if(isMature($lamb['age'])&&rand(0,9)>5){$newGeneration[$yard]++;}

                if((count($lambs)+$newGeneration[$yard])>=$YARD_CAPACITY) break;

                if(isYoungOrAdult($lamb['age'])&&rand(0,9)>7){$newGeneration[$yard]++;}
            }
        }
        self::addNewGeneration($newGeneration);
        return $newGeneration;
    }

    public static function isAjax(){
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }


    public static function refresh(){
        if(self::isAjax()) {
            self::growUpSheep();
            $result = self::reproduceSheep();
            die(json_encode($result));
        }
    }

    public static function kill($yard){
        if(self::isAjax()&&is_int(intval($yard))) {
            $yard = intval($yard);
            $delete = "delete from `sheep` where `yard`={$yard}";
            DatabaseProcessor::query($delete);
            echo $yard;
            die;
        }
    }

    public static function getCommands(){
        $commands = array();
        $commands["kill"]="kill";
        $commands["from"]="from";
        $commands["yard"]="yard";
        $commands["move"]="move";
        $commands["to"]="to";
        $commands["create"]="create";
        $commands["in"]="in";
        $commands["youngest"]="youngest";
        $commands["oldest"]="oldest";
        $commands["refresh"]="refresh";
        return $commands;
    }

    public static function getHelp(){
        $help = file_get_contents("templates/en/help.txt");
        $commands = self::getCommands();
        foreach($commands as $com=>$local){
            $help = str_replace("{\${$com}}","<b>{$local}</b>",$help);
        }
        return $help;
    }

    public static function killCommand(){
        if(self::isAjax()){
            $count = $_REQUEST['count'];
            $yard = $_REQUEST['yard'];
            $order = $_REQUEST['age']=='oldest'?'DESC':'ASC';
            $delete = "delete from `sheep` where yard={$yard} order by `age` {$order} limit {$count}";
            if(DatabaseProcessor::query($delete)!=false)
                echo "success";
            else
                echo "error";
            die;
        }
    }

    public static function moveCommand(){
        if(self::isAjax()){
            $count = $_REQUEST['count'];
            $from = $_REQUEST['from'];
            $to = $_REQUEST['to'];
            $delete = "delete from `sheep` where yard={$from} order by `age` DESC limit {$count}";
            self::addNewGeneration(array($to=>$count));
            if(DatabaseProcessor::query($delete)!=false)
                echo "success";
            else
                echo "error";
            die;
        }
    }

    public static function createCommand(){
        if(self::isAjax()){
            $count = $_REQUEST['count'];
            $yard = $_REQUEST['yard'];
            self::addNewGeneration(array($yard=>$count));
            echo "success";
            die;
        }
    }
}
