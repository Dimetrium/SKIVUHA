<?php

class File
{
	private $filez;
    private $newFilez;
	
    
    
	function __construct($sourse_file){
	$this->filez = file($sourse_file);
	}
	
    function getText()
    {
        return $this->filez; 
    }
    
    function getString($num_string)
    {
        if($num_string > count($this->filez))
            return false;
        else
            return $this->filez[$num_string];
    }
        
    function setString($num_string, $changes)
    {
        if($this->getString($num_string) === false)
            return false;
        else
        {
            $this->filez[$num_string] = $changes;
            $this->newFilez = $this->filez;
            return $this->filez[$num_string];
        }
    }
    
    function getSim($num_string, $num_sim)
    {
        if($num_string > count($this->filez))
            return false;
        else
        {
            if($num_sim > strlen($this->filez[$num_string]))
                return false;
            else
                return $this->filez[$num_string][$num_sim];
        }
    }
   
    function setSim($num_string, $num_sim, $changes)
    {
        if($this->getSim($num_string, $num_sim) === false)
            return false;
            else
            {
                $this->filez[$num_string][$num_sim] = $changes;
                $this->newFilez = $this->filez;
                return $this->filez[$num_string][$num_sim] = $changes;
            }
        }
	
    function newFile()
	{
		$f = fopen(DEST_FILE, "wd");
		for($i = 0; $i < count($this->newFilez); $i++)
		{
			fwrite($f, $this->newFilez[$i]);
        }
		fclose($f);
		return $this->newFilez;
	}
}
?>
