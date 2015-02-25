<?php
require_once('config.php');
function __autoload($class)
{
  require_once('lib/'.$class.'.php');
}

$select = 'BookName';
$table = 'Book';
$where = ['BookId','1'];

$myPdo = new PdoTry(HOST, DB_NAME, USER, PASSWORD);
$mySql = new Sql;
$query = $mySql->select($select)
  ->table($table)
  ->where($where[0],$where[1])
  ->query();

$arr = $myPdo->commit($query, $where[1]);
var_dump($arr);
  
require_once VIEW;
?>
