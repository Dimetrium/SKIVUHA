<?php
class Instrument implements iInstrument
{
    public $name;
    public $category;
    
    function __construct($name, $category)
    {
        $this->name = $name;
        $this->category = $category;
    }
    public function getName()
    {
        return $this->name;
    }
    
    public function getCategory()
    {
        return $this->category;
    }
}