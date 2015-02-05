<?php
  function __autoload($class)
  {
    include('lib/'.$class.'.php');
  }

$obj = new MySql;
$obj->add('val','1111');
//echo $obj->read('val');

?>
