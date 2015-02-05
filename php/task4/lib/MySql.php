<?php
class MySql implements iDataWork
{
  function __construct()
  {
    mysql_connect(HOST,USER,PASSWORD);
    mysql_select_db(DB_NAME);
  }
  
  public function add($key, $val)
  {
    $insert = "INSERT INTO DB_NAME (znachenie, val)VALUES: .$key.' = '.$val;
    mysql_query($insert);
  return true;
  }
  public function read($key)
  {
  }
  public function remove($key)
  {
  }

  


}



?>
