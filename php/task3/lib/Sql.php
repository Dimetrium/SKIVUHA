<?php
class Sql
{
    protected $query;
    
  function selectQuery($row, $table, $start=0, $end=10)
  {
    if(empty($row[0]) || empty($table[0]))
    {
        $queryError = "Error. One field is empty!";
        return $this->query = $queryError;
    }
    elseif($row[0] == '*')
    {
        $queryError = "Error. You can't use '*' in query";
        return $this->query = $queryError;
    }
      else
      {
      $query = 'SELECT '.implode(', ',$row).' FROM '.implode(', ',$table).' LIMIT '.$start.', '. $end;
      $this->query = $query;
      }
    return true;
  }

      function deleteQuery($table, $name, $value, $start=0, $end=10)
  {
          if(empty($table[0]) || empty($name[0]) || empty($value))
    {
        $queryError = "Error. One field is empty!";
        return $this->query = $queryError;
    }
      else
      {
          $query  = 'DELETE FROM '.implode(', ',$table).' WHERE '.implode(', ', $name).' = '.$value.' LIMIT '.$start.', '. $end;
          $this->query = $query;
          return true;
      }
  }
    
  function insertQuery($row, $value, $table, $start=0, $end=10)
  {
      if(empty($table[0]) || empty($row[0]) || empty($value[0]))
    {
        $queryError = "Error. One field is empty!";
        return $this->query = $queryError;
      }
      elseif($row[0] == '*')
    {
        $queryError = "Error. You can't use '*' in query";
        return $this->query = $queryError;
    }
    else
    {
    $query = 'INSERT INTO '.implode(', ',$table).' ('.implode(', ',$row).') VALUES ('.implode(', ',$value).') LIMIT '. $start.', '.$end;
      $this->query = $query;
      return true;
    }
  }
  
    function updateQuery($oldName, $newName, $table, $start=0, $end=10)
  {if(empty($oldName[0]) || empty($table[0]))
    {
        $queryError = "Error. One field is empty!";
        return $this->query = $queryError;
    }
    else
    {
    $query = 'UPDATE '.implode(', ',$table). ' SET '.implode(', ',$oldName).' = '.implode(', ',$newName).' LIMIT '.$start.', '.$end;
      $this->query = $query;
      return true;
    }
  }
    function protect($value){
        $value = implode(', ', $value);
        $value = trim($value);
        $value = explode(', ', $value);
        return $value;
    }

}
?>
