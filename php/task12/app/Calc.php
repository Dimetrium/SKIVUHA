<?php
class Calc
{
  public $a;
  public $b;
  protected $err;
  

  public function __construct()
  {
  }    

  public function setA($a)
  {
    if(!is_numeric($a))
    {
      $this->a=$a;
      return false;
    }
    elseif(trim($a)=='')
      unset($a);
    else
      $this->a= $a;
  }

  public function getA()
  {
    if(!is_numeric($this->a))
    { 
      $this->err = 'your value is wrong data!';
      return false;
    }
    elseif(isset($this->a))
    return $this->a;
    else
    {
      $this->err = 'your value is empty';
      return false;
    }
  }

  public function setB($b)
  {
    if(!is_numeric($b))
    {
      $this->b=$b;
      return false;
    }
    elseif(trim($b)=='')
      unset($b);
    else
      $this->b = $b;
  }

  public function getB()
  { 
    if(!is_numeric($this->b))
    {
      $this->err = 'your value is wrong data!';
      return false;
    }
    elseif(isset($this->b))
    return $this->b;
    else
    {
      $this->err = 'your value is empty';
      return false;
    }
  }

  public function sum()
  {
    $sum = $this->a + $this->b;
    return $sum;
  }

  public function sub()
  {
    $sub = $this->a - $this->b;
    return $sub;
  }

  public function mul()
  {
    $mul = $this->a * $this->b;
    return $mul;
  }

  public function div()
  {
    if($this->b == 0)
    {
      $this->err = 'na nol delit nelzya';
      return false;
    }
    else 
      $sub = $this->a / $this->b;
     return true;
     
  }
}
?>
