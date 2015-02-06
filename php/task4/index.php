<?php
  function __autoload($class)
  {
    require_once('lib/'.$class.'.php');
  }
require_once 'functions.php';


$cookie = new Cookie();
$add_cookie = add($cookie, 'this', 'value');
$read_cookie = read($cookie, 'this');
$remove_cookie = remove($cookie, 'this');

$session = new Session();
$add_c = add($session, 'this', 'value');
$read_c = read($session, 'this');
$remove_c = remove($session, 'this');

$my_sql = new MySql();
echo $my_sql->remove('this');
require_once 'templates/index.php';
