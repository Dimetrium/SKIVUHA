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
    $key = $this->protect($key);
    $val = $this->protect($val);
    $query = "SELECT znachenie FROM task4 WHERE znachenie = '".$key."';";
    $res = mysql_query($query);
    $row = mysql_fetch_assoc($res);
    if(empty($row)){
      $query = "INSERT INTO task4 (znachenie, val) VALUES ('".$key."', '".$val."');";
    mysql_query($query);
        return $key.' added!';
    }
    else return 'Field '.$key.' already exist!';
  }
  public function read($key)
  {
      $key = $this->protect($key);
      $query = "SELECT znachenie, val FROM task4 WHERE znachenie = '".$key."';";
      $res = mysql_query($query);
      $arr = array();
      while($row = mysql_fetch_assoc($res))
        $arr[]=$row;
      return $arr[0]['val'];
      }
  public function remove($key)
  {
      $key = $this->protect($key);
      $query = "DELETE FROM task4 WHERE znachenie = '".$key."';";
      mysql_query($query);
      return $key.' deleted'; 
  }

  protected function protect($value)
  {
    $value = mysql_real_escape_string(trim($value));
    return $value;
  }  
}

?>
