<?php
use lib\sum\Result as A;
use lib\multi\Result as B;

$obj=A::res(5,5);
$obj2=B::res(5,5);

function __autoload($class)
{
$class = (str_replace('\\', '/',$class.'.php'));
require_once($class);
}

require_once('templates/index.php');
