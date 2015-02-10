<?php
include 'lib/HtmlHelper.php';
$arr=array('Igor','Vova','Petya','Semen');

$select=HtmlHelper::select($arr);
$ul=HtmlHelper::ul($arr);

include 'templates/index.php';
?>
