<?php

require_once ('system/Brain.php');

ini_set("html_errors","On");
ini_set("display_errors","On");


Brain::init();
$tp = TemplateProcessor::getTemplateProcessor();

Brain::process($tp);

$tp->display("index.tpl");

Brain::finish();
?>