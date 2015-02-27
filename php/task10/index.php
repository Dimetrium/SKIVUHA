<?php
require_once('config.php');
function __autoload($class)
{
  require_once('lib/'.$class.'.php');
}

$myPdo = new PdoTry(HOST, DB_NAME, USER, PASSWORD);
$arr = $myPdo->select('user_id,user_name,email,create_date')
  ->table('users')
  ->where('user_id','13')
  ->query()
  ->commit();

if(is_array($arr))
{
foreach($arr as $key => $val)
	{
		$arr.= '<tr><td>'.$key.'</td><td>'.$val.'</td></tr>';
	}
}

require_once VIEW;
?>
