<?php
class Cookie implements iDataWork
{

  public function add($key, $val)
  {
      if(!isset($_COOKIE[$key]))
         {  $_COOKIE[$key]=$val;
            setcookie($key, $val, time()+3600);
            return 'Cookie create';
         }
         else return 'Cookie exist';
  }

  public function read($key)
  {
    return $_COOKIE[$key];
  }
  
  public function remove($key)
  {
    setcookie($key, '',time()-1);
      return 'Cookie deleted';
  }
}
