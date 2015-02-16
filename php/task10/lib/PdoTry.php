<?php
class PdoTry extends Sql
{
  protected $db;
  
  function __construct($host, $dbname, $user, $pass)
  {
    $this->db = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
  }

  function select($val)
  {parent::select($val);
  return $this;}
  
  function table($val)
  {parent::table($val);
  return $this;}
  
  function where($is, $val)
  {parent::where($is, $val);
  return $this;}

  function order($val)
  {parent::order($val);
  return $this;} 

  function commit()
  {
    if(strlen($this->queryError)!=0)
      {return $this->queryError;}
    else
    {
      $sql=$this->query();
      $stmt=$this->db->prepare($sql);
        if(strlen($this->is)!=0)
        {$stmt->bindParam(1,$this->where);}
        if(strlen($this->order!=0))
        {$stmt->bindParam(2,$this->order);}
      $err=$stmt->execute();
      if($err===false)
        {$this->queryError = 'Wrong data!';
        return $this->queryError;}
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
}
?>


