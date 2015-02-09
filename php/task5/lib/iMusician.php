<?php
interface iMusician
{
  public function addInstrument(iInstrument $obj);
  public function getInstrument();
  public function assignToBand(iBand $nameBand);
  public function getMusician();
}
?>
