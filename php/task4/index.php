<?php
require_once 'config.php';
function __autoload($class)
  {
    require_once('lib/'.$class.'.php');
  }
require_once 'functions.php';


$cookie = new Cookie();
$add_cookie = add($cookie, 'kluchik', 'value');
$read_cookie = read($cookie, 'kluchik');
$remove_cookie = remove($cookie, 'kluchik');

$session = new Session();
$add_session = add($session, 'kluchik', 'value');
$read_session = read($session, 'kluchik');
$remove_session = remove($session, 'kluchik');

$my_sql = new MySql();
$add_my_sql = add($my_sql, 'user22','znachenie');
$read_my_sql = read($my_sql, 'user22');
$remove_my_sql = remove($my_sql, 'user22');

require_once 'templates/index.php';
