<?php
class Musician implements iMusician
{
    public $musician;
    public $instrument;
       
    public function __construct($musician, $instrument)
    {
        $this->musician = $musician;
        $this->instrument[] = $instrument;
    }
    
  public function addInstrument(iInstrument $obj)
  {
      $this->instrument[] = $obj;
  }
  public function getInstrument()
  {
      return $this->instrument;
  }
  public function assignToBand(iBand $nameBand)
  { 
      $nameBand->addMusician($this);
      return true;
  }
  public function getMusician()
  {
      return $this->musician = $musician;
  }
    
    
}
?>