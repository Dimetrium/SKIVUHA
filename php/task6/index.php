<?php
include 'config.php';
include 'lib/Model.php';
include 'lib/View.php';
include 'lib/Controller.php';

try
{
  $obj = new Controller();
}
catch(Exception $e)
{
  echo $e->getMessage();	           
}
var_dump($_POST);
?>