<?
include 'config.php';
function __autoload($class)
{
  include('lib/'.$class.'.php');
}

$row = array('list', 'list2');
$table = array('table');
$namedel= array('name');
$valuedel = ('Vasya');
$valueins = array('Kolya','Ivan');
$oldName = array('Vasylyi');
$newName = array('Alex');
 
    
$obj = new MySql;
$row = $obj->protect($row);
echo $obj->selectQuery($row, $table).'<br>';
echo $obj->deleteQuery($table, $namedel, $valuedel).'<br>';
echo $obj->insertQuery($row, $valueins, $table).'<br>';
echo $obj->updateQuery($oldName,$newName,$table).'<br>';
$obj = new PgSql;
echo $obj->selectQuery($row, $table).'<br>';
?>
