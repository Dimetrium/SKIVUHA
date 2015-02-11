<?php
class Band implements iBand
{
    public $name;
    public $genre;
    public $musician;
    
    public function __construct($name, $genre)
    {
        $this->musician=array();
        $this->name = $name;
        $this->genre = $genre;
    }
    
    public function getName()
    {
        return $this->name;
    }
    public function getGenre()
    {
        return $this->genre;
    }
    public function addMusician(iMusician $obj)
    {
      foreach($this->musician as $val)
      {if($val===$obj)
      
      return true;}
                         

        $this->musician[] = $obj;
    }
    public function getMusician()
    {
        return $this->musician;
    }
}
