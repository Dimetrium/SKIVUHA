<?php
class PdoTry extends Sql
{
  protected $db;
  private $err;
  
  function __construct($host, $dbname, $user, $pass)
  {
    $this->db = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
  }

  public function commit($query, $where='' ,$order='')
  {
        $stmt=$this->db->prepare($query);
        if(strlen($where)!=0)
        {$stmt->bindParam(1,$where);}
        if(strlen($order!=0))
        {$stmt->bindParam(2,$order);}
		$err=$stmt->execute();
		if($err===false)
        {$this->err = 'Wrong data!';
        return $this->err;}
      else
      {
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $arr=array();
        while($row = $stmt->fetch())
          $arr = $row;
        return $arr;
      }
    }
}
?>