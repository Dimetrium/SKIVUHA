<?php
require_once('config.php');
function __autoload($class)
{
  require_once('lib/'.$class.'.php');
}

$sql = new PdoTry(HOST, DB_NAME, USER, PASSWORD);
$query= $sql->select('')->table('Book')->where('BookId','2')->commit();
var_dump($query);
include 'VIEW';
?>
