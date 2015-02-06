<?php
class Session implements iDataWork
{
    
    public function __construct()
    {
        session_start(); 
    }
    
    public function add($key, $val)
    {
        if(!isset($_SESSION[$key]))
        {
            $_SESSION[$key]=$val;
            return 'Session created';
        }
        else return 'Session exist';
            
    }

      public function read($key)
  {
     
         return $_SESSION[$key];
          
  }
  
  public function remove($key)
  {
      unset($_SESSION[$key]);
      return 'Session deleted';
  }
}


