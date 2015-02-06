<?php
class MySql implements iDataWork
{
  function __construct()
  {
    //mysql_connect(HOST,USER,PASSWORD);
    //mysql_select_db(DB_NAME);
  }
  
  public function add($key, $val)
  {
    $query = "SELECT znachenie FROM task4 WHERE znachenie = `".$key."`;";
    $res = mysql_query($query);
    if(!$res)
    {    $query = "INSERT INTO task4 (znachenie, val) VALUES (`".$key."` = `".$val."`);";
        mysql_query($query);
        return $query;
    }
    else return 'Field '.$key.' already exist!';
  }
  public function read($key)
  {
      $query = "SELECT znachenie, val FROM task4 WHERE znachenie = `".$key."`;";
      $res = mysql_query($query);
      $arr = array();
      while($row = mysql_fetch_array($res))
          $arr[]=$row;
      return $arr[0]['val'];
      }
  public function remove($key)
  {
      $query = "DELETE FROM task4 WHERE znachenie = `".$key."`;";
      mysql_query($query);
      return $key.' deleted'; 
  }

  
}

?>
