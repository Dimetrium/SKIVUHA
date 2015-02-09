<?php
class View
{
    public $shablon;
    public $keys=array();
    
    function setKey($key, $value)
    {
        $this->keys[$key] = $value;
        
    }
    
    function setShablon($template)
    {   
        
        if(is_file($template))
        {
            $this->shablon = file_get_contents($template);
            return $this->shablon;
        }
        else
        {
        throw new Exception('No template file');
        }
    }

    function chengeShablonKey()
    {
        foreach($this->keys as $metka=>$value)
           $this->shablon = str_replace($metka, $value, $this->shablon);
        return $this->shablon;
    }
}   
?>