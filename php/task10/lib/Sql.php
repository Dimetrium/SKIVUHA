<?php
class Sql
{
  protected $query;
  protected $queryError;
  protected $select;
  protected $table;
  protected $where;
  protected $is;
  protected $limit;

  function select($val)
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

  function table($val)
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

  function where($is, $val)
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

  protected function query()
  {
    $query = 'SELECT '.$this->select.' FROM '.$this->table.' WHERE '.$this->is.' = ? ';
    return $query;    
  }

  /*  protected function selectQuery($row, $table, $limit)
  {
        if (strlen($limit)!=0)
      $limit=" LIMIT $limit";
      $query = 'SELECT '.implode(', ',$row).' FROM '.implode(', ',$table).' '.$limit;
      $this->query = $query;
      }
    return true;
  }
   */
  
  protected function protect($value){
        $value = htmlspecialchars(trim($value));
        return $value;
    }
}
?>
