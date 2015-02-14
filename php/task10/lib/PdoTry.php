<?php
class PdoTry
{
  public $db;
  //public $query;
  public $select;
  public $from;
  public $where;
  
  function __construct()
  {
 // $this->db = new PDO("mysql:host=localhost;dbname=user2",'root','123');
  }

  function select($val='*')
  {
     $this->select='*';
    if($val!='*')
      $this->select = $val;
    return $this;
  }
  
  function from($val)
  {
    if(isset($val))
      $this->from = $val;
    return $this;
  }

  function where($val)
  {
    if(isset($val))
      $this->where=$val;
    return $this;
  }

  
  function query()
  {

    $db = new PDO("mysql:host=localhost;dbname=user2",'root','123');
    //$query =  'SELECT '.$this->select.' FROM '.$this->from.' WHERE '.$this->where;
    $query =  'SELECT :col FROM :table WHERE :var';
    $stmt=$db->prepare($query);
    $q = array(':col'=>$this->select, ':table'=>$this->from,':var'=>$this->where);
    $stmt->execute($q);
    $book=$stmt->fetchAll();
    echo '<pre>';
    var_dump($q);
    var_dump($stmt);
    return $query;
  }
  
  function comm()
  {

    $db = new PDO("mysql:host=localhost;dbname=user2",'root','123');
    $sql='SELECT ? FROM ? WHERE ? ';
    $stmt=$db->prepare($sql);
    //var_dump($stmt->bindParam(':col',$this->select,PDO::PARAM_STR));
    //var_dump($stmt->bindParam(':table',$this->from,PDO::PARAM_STR));
    //var_dump($stmt->bindParam(':var',$this->where,PDO::PARAM_STR));
    //$q=array(':col'=>'*', ':table'=>'Book',':var'=>'BookId = 1');
    var_dump($stmt->execute(array($this->select,$this->from,$this->where)));
    $book=$stmt->fetchAll();
    echo '<pre>';
    var_dump($stmt->execute());
    return $book;
  }



}
?>


