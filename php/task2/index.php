<pre>
<?php
include 'config.php';
class File
{
	public $file;
	
	function __construct($sourse_file){
	$this->file = file($sourse_file);
	}
	
	function getStroka(){
		file_put_contents(DEST_FILE, $this->file);
		return true;
	}
	
	function getSimvol(){
		if (is_writable(DEST_FILE)){
			
		
		}
		foreach($this->file as $file_string)
		fwrite(DEST_FILE, $file_string);
	}
	
}
$obj = new File(SOURCE_FILE);
var_dump($obj->file);
$obj->getSimvol();

?>