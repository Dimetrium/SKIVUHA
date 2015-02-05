<?php
class Cookie
{
  

  public function add($key, $val)
  {
    setcookie($key, $val, time()+3600);
    return true;
  }

  public function read($key)
  {
    return $_COOKIE[$key];
  }
  
  public function remove($key)
  {
    setcookie($key, "", time()-3600);
  }
}

?>
