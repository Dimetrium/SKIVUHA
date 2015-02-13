<?php
class PdoTry
{
public $query='SELECT * FROM Book';
  public $select;
  public $from;
  function __construct()
  {
try{
  $DBH = new PDO("mysql:host=localhost;dbname=user2",'root','123');
$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);}
catch(PDOException $e){echo $e->getMessage();}

  }

	function query()
{
	foreach ($DBH->query($this->query)as $row)
{
	$this->select=$row;
}
	return $this->select;
}
	

  function select($val='*')
  {
    if($val!='*')
      $this->select = $val;
//echo 'select';
    return $this;
  }
  
  function from($val)
  {
    if(isset($val))
      $this->from = $val;
//	echo $val;
    return $this;
  }

}
?>


