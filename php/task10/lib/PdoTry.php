<?php
class PdoTry 
{
  protected $db;
  public $queryError;
  protected $select;
  protected $table;
  protected $where;
  protected $is;
  protected $order;
  protected $delete;
  protected $update;
  protected $insert;
  protected $old;
  protected $new;
  protected $query;
  
  function __construct($host, $dbname, $user, $pass)
  {
    $this->db = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
  }
   /*
   *select
   *
   *@param val: takes value coll.
   */
  public function select($val)
  {
    $this->select='*';
    $val = $this->protect($val);
    if($val=='')
    {
      return $this;
    }
    else
    {
      $this->select = $val;
    }
    return $this;
  }   
   /*
   *delete
   */
  public function delete()
  {
    $this->delete = 'DELETE FROM ';
    return $this;
  }
   /*
   *insert
   */
  public function insert()
  {
    $this->insert = 'INSERT INTO ';
    return $this;
  }
   /*
   *update
   */
  public function update()
  {
    $this->update = 'UPDATE ';
    return $this;
  }
   /*
   *table
   *
   *@param val: takes value table.
   */
  public function table($val)
  {
    if(trim($val)=='')
    {
      $this->queryError.= "Error. Table is empty!.<br>";
      return $this;
    }
    else
    {
      $val= $this->protect($val);
      $this->table = $val;
    }
    return $this;
  }
   /*
   *select
   *
   *@param val: takes value coll.
   */
  public function where($is, $val)
  {
    if(trim($val)=='' || trim($is)=='')
    {
      $this->queryError.="Error. Wrong parametre WHERE<br>";
      return $this;
    }
    else
    {
      $is=$this->protect($is);
      $this->is=$is;
      $this->where=$val;
    }
    return $this;
  }
   /*
   *set
   *
   *@param old: takes before assignment.
   *@param new: takes after assignment.
   */
  public function set($old, $new)
  {
    if(trim($old)=='' || trim($new)=='')
    {
      $this->queryError.="Error. Wrong parametre SET<br>";
      return $this;
    }
    else
    {
      $old=$this->protect($old);
      $this->old=$old;
      $this->new=$new;
    }
    return $this;
  }
   /*
   *order
   *
   *@param val: takes value coll order.
   */
  public function order($val)
  {
    if(trim($val)=='')
    {
      $this->queryError.="Error. Wrong parametre ORDER<br>";
      return $this;
    }
    else
    {
      $val=$this->protect($val);
      $this->order=$val;
    }
    return $this;
  }
   /*
   *Query bilder
   */
  function query()
  {
    $where='';
    $order='';
    $set='';

    if(strlen($this->old)!=0)
    {
      $set="SET $this->old = :set";
    }
    if(strlen($this->is)!=0)
    {
      $where="WHERE $this->is = :where";
    }
    if(strlen($this->order)!=0)
    {
      $order="ORDER BY :order";
    }
    if(strlen($this->select)!=0)
    {
      $this->select = "SELECT $this->select FROM ";
    }
    
    $this->query = $this->select.$this->delete.$this->insert.$this->update.$this->table.' '.$set.' '.$where.' '.$order;
  return $this;
  }
   /*
   *Checks input value
   *
   *@return: clean value.
   */
  protected function protect($value)
  {
    $value = htmlspecialchars(trim($value));
    return $value;
  }

   /*
   *Prepare query and execute
   *
   *@return: result of the query.
   */
public function commit()
{
  if(strlen($this->queryError)!=0)
  {
    return $this->queryError;
  }
  else
  {
    $stmt=$this->db->prepare($this->query);
  }
  if(!empty($this->old))
  {
    $stmt->bindParam(':set',$this->new);
  }
  if(!empty($this->where))
  {
    $stmt->bindParam(':where',$this->where);
  }
  if(strlen($this->order) !=0)
  {
    $stmt->bindParam(':order',$this->order);
  }
  $err=$stmt->execute();
  if($err===false)
  {
    $this->queryError = 'Wrong data!';
    return $this->queryError;}
  else
  {
	if(trim($this->delete)!= '')
	{
		$arr = 'Query OK. Data delete.';
		return $arr;
	}
	if(trim($this->update)!= '')
	{
		$arr = 'Query OK. Data update.';
		return $arr;
	}
	if(trim($this->insert)!= '')
	{
		$arr = 'Query OK. Data insert.';
		return $arr;
	}
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $arr=array();
    while($row = $stmt->fetch())
      $arr = $row;
    return $arr;
  }
}  
}
?>
