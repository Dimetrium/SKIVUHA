<?php
class PdoTry
{
  private $select;
  private $from;
  function __construct()
  {
  $DBH = new PDO("mysql:host=localhost;dbname=user2",user2,tuser2);
  }

  function select($val='*')
  {
    if($val!='*')
      $this->select = $val;
    return $this;
  }
  
  function from($val)
  {
    if(isset($val))
      $this->form = $form;
    return $form;
  }

}



