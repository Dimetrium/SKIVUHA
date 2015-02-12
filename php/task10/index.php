<?php
include('lib/PdoTry.php');

$obj=new PdoTry();


$obj->select('test')->from('task4');

//include 'VIEW';

?>
