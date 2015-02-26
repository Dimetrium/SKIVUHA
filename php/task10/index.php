<?php
require_once('config.php');
function __autoload($class)
{
  require_once('lib/'.$class.'.php');
}

$myPdo = new PdoTry(HOST, DB_NAME, USER, PASSWORD);
$arr = $myPdo->select('*')
  ->table('Genres')
  ->where('GenreId','5')
  ->query()
  ->commit();

require_once VIEW;
?>
