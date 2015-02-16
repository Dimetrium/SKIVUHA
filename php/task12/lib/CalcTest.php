<?php
include("Calc.php");
class CalcTest extends PHPunit_Framework_TestCase

{
  protected $calc;
  protected $sum;
  protected $sub;
  protected $div;
  protected $mul;
  
  function setUp()
  {
    $this->calc=new Calc();
    $this->sum = $this->calc->a+$this->calc->b;
    $this->sub = $this->calc->a-$this->calc->b;
    $this->mul = $this->calc->a*$this->calc->b;

  }

  function tearDown()
  {
    $this->calc=NULL;
    $this->sub=NULL;
    $this->sum=NULL;
    $this->div=NULL;
    $this->mul=NULL;
  }

  public function testSumConditionEquals()
  {
    $this->assertEquals($this->sum, $this->calc->sum());
  }

  public function testSumConditionTrue()
  {
    $this->assertTrue($this->sum == $this->calc->sum());
  }
  
  public function testSumConditionFalse()
  {
    $this->assertFalse($this->sum != $this->calc->sum());
  }

  public function testSubConditionEquals()
  {
    $this->assertEquals($this->sub, $this->calc->sub());
  }
  
  public function testSubConditionTrue()
  {
    $this->assertTrue($this->sub == $this->calc->sub());
  }

  public function testSubConditionFalse()
  {
    $this->assertFalse($this->sub != $this->calc->sub());
  }

  public function testMulConditionEquals()
  {
    $this->assertEquals($this->mul, $this->calc->mul());
  }

  public function testMulConditionEqualsTrue()
  {
    $this->assertTrue($this->mul == $this->calc->mul());
  }
  public function testMulConditionEqualsFalse()
  {
    $this->assertFalse($this->mul != $this->calc->mul());
  }
  
  public function testSetAnotEmpty()
  {
    $this->calc->setA('');
    $this->assertFalse($this->calc->getA());
  
    $this->calc->setA(5);
    $this->assertTrue(null !== $this->calc->getA());
  }  
 
  public function testSetAnotArray()
  {
    $this->calc->setA(array(5));
    $this->assertFalse($this->calc->getA());
  }

  public function testSetBnotEmpty()
  {
    $this->calc->setB('');
    $this->assertFalse($this->calc->getB());
  
    $this->calc->setB(5);
    $this->assertTrue(null !== $this->calc->getB());
  }  
 
  public function testSetBnotArray()
  {
    $this->calc->setB(array(5));
    $this->assertFalse($this->calc->getB());
  }
  
  public function testSetBnotString()
  {
    $this->calc->setB('mimimi');
    $this->assertFalse($this->calc->getB());
  }


  public function testSetAnotString()
  {
    $this->calc->setA('mimimi');
    $this->assertFalse($this->calc->getA());
  }

  public function testDivConditionDivByZero()
  {
    
    $this->calc->setA(1);
    $this->calc->setB(0);
    $this->assertFalse($this->calc->div());
  }
}
?>
