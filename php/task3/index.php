<?
include 'config.php';
function __autoload($class)
{
  include('lib/'.$class.'.php');
}
$sql_query='';

$row = array('list', 'list2');
$table = array('table');
$namedel= array('name');
$valuedel = ('Vasya');
$valueins = array('Kolya','Ivan');
$oldName = array('Vasylyi');
$newName = array('Alex');
$limit ='';

$objMySql = new MySql;
$sql_query.= $objMySql->selectQuery($row, $table, $limit).'<br>';
$sql_query.= $objMySql->deleteQuery($table, $namedel, $valuedel, $limit).'<br>';
$sql_query.= $objMySql->insertQuery($row, $valueins, $table, $limit).'<br>';
$sql_query.= $objMySql->updateQuery($oldName,$newName,$table, $limit).'<br><hr>';
$objPgSql = new PgSql;
$sql_query.= $objPgSql->selectQuery($row, $table, $limit).'<br>';
$sql_query.= $objPgSql->deleteQuery($table, $namedel, $valuedel, $limit).'<br>';
$sql_query.= $objPgSql->insertQuery($row, $valueins, $table, $limit).'<br>';
$sql_query.= $objPgSql->updateQuery($oldName,$newName,$table, $limit).'<br><hr>';
$objMsSql = new MsSql;
$sql_query.= $objMsSql->selectQuery($row, $table, '').'<br>';
$sql_query.= $objMsSql->deleteQuery($table, $namedel, $valuedel, '').'<br>';
$sql_query.= $objMsSql->insertQuery($row, $valueins, $table, '').'<br>';
$sql_query.= $objMsSql->updateQuery($oldName,$newName,$table, '').'<br><hr>';

include VIEW;
?>
