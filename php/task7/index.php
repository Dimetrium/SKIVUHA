<?php
class Demo
{
  private $data='!!!yes';

  public function __construct()
  {  

  echo 'create obj<br>';

  }

  function __destruct()
  {
    echo 'obj deleted<br>';
  }

  function __get($val)
  {
    if (property_exists($this, $val))
    {return $this->$val;}
    else
    {echo 'property not exists<br>';}
  }
  
  function __set($val, $value)
  {
   if(property_exists($this, $val)) 
   {$this->$val = $value;}
   else
   {echo "access denied to set $val = $value <br>";}
  }
  function __isset($val)
  {
    return isset($this->data);
  }
  function __toString()
  {
    return 'tut srting<br>';
  }
}
$demo = new Demo();
$demo->name;
$demo->name=5;
var_dump($demo->data);
echo $demo;
?>
