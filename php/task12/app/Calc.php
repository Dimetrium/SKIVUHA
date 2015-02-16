<?php
class Calc
{
  public $a;
  public $b;
  

  public function __construct()
  {
  }    

  public function setA($a)
  {
    return $this->a = $a;
  }

  public function setB($b)
  {
    return $this->b = $b;
  }    

  public function sum()
  {
    $sum = $this->a + $this->b;
    return $sum; 
  }

  public function sub()
  {
  }

  public function mul()
  {
  }

  public function div()
  {
  }
}
?>
