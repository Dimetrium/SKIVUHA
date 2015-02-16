<?php
require_once('config.php');
function __autoload($class)
{
  require_once('lib/'.$class.'.php');
}

$sql = new PdoTry(HOST, DB_NAME, USER, PASSWORD);
$query= $sql->select('BookName')
  ->table('Book')
  ->where('BookId','1')
  ->commit();


require_once VIEW;
?>
