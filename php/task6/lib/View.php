<?php
class View
{
    private $forRender;
	private $file;

	public function __construct($template)
	{       
        if(is_file($template))
        {
            $this->file = file_get_contents($template);
        }
        else
        {
            throw new Exception('No template file');
        }
    }
	public function addToReplace($mArray)
	{
	  foreach($mArray as $key=>$val)
	   {
			$this->forRender[$key] = $val;
	   }
	}

	public function templateRender()
	{
		foreach($this->forRender as $key=>$val)
		{
			$this->file = str_replace($key, $val, $this->file);
		}													
		echo $this->file;
    }
}   
?>