<?php
//include 'lib/Multi.php';
//include 'lib/Sum.php';

function __autoload($class)
{
	$class = str_replace('\\', '/',$class.'.php');
	require_once($class);
}

$obj=lib\multi\Result::res(5,5);
echo $obj;

