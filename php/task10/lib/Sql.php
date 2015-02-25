<?php
class Sql
{
  protected $queryError;
  protected $select;
  protected $table;
  protected $where;
  protected $is;
  protected $order;

  public function select($val)
  {
    $this->select='*';
    $val = $this->protect($val);
    if($val=='')
      {
        return $this;
      }
      else
        $this->select = $val;
      
      return $this;
  }   

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

  public function query()
  { $where='';
    $order='';
      if(strlen($this->is)!=0)
    {$where="WHERE $this->is = ?";}
      if(strlen($this->order)!=0)
    {$order="ORDER BY ?";}
	if(strlen($this->queryError)!=0)
	{
		return $this->queryError;
	}
	else
	{
    $query = 'SELECT '.$this->select.' FROM '.$this->table.' '.$where.' '.$order;
	return $query;
	}
  }
  
  protected function protect($value){
        $value = htmlspecialchars(trim($value));
        return $value;
    }
}
?>