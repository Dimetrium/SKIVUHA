<?php
class PdoTry
{
  public $select;
  public $from;
  function __construct()
  {
 // $DBH = new PDO("mysql:host=localhost;dbname=user2",user2,tuser2);
  }

  function select($val='*')
  {
    if($val!='*')
   //   $this->select = $val;
echo 'select';
    return $this;
  }
  
  function from($val)
  {
    if(isset($val))
     // $this->form = $form;
	echo $val;
    return $this;
  }

}



