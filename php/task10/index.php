<?php
include('lib/PdoTry.php');

$obj=new PdoTry();


var_dump($obj->select()->from(task4));

//include 'VIEW';

?>
