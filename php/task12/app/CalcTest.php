<?php
include("Calc.php");
class CalcTest extends PHPunit_Framework_TestCase

{
  public function testSum()
  {
    $calc = new Calc();
    $expected = $calc->a+$calc->b; 
    $this->assertEquals($expected, $calc->sum());
  }  
}
