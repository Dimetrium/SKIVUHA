<?php
class Sql
{
    protected $query;
    
    protected function selectQuery($row, $table, $limit)
  {
        $row = $this->protect($row);
        $table = $this->protect($table);
    if(empty($row) || empty($table))
    {
        $queryError = "Error. One field is empty!";
        return $this->query = $queryError;
    }
    elseif(!array_search('*', $row)===false)
    {
        $queryError = "Error. You can't use '*' in query";
        return $this->query = $queryError;
    }
      else
      {
        if (strlen($limit)!=0)
        $limit=" LIMIT $limit";
      $query = 'SELECT '.implode(', ',$row).' FROM '.implode(', ',$table).' '.$limit;
      $this->query = $query;
      }
    return true;
  }

      protected function deleteQuery($table, $name, $value, $limit)
  {
        $table = $this->protect($table);
        $name = $this->protect($name);
          if(empty($table) || empty($name) || empty($value))
    {
        $queryError = "Error. One field is empty!";
        return $this->query = $queryError;
    }
      else
      {
          if (strlen($limit)!=0)
              $limit=" LIMIT $limit";
          $query  = 'DELETE FROM '.implode(', ',$table).' WHERE '.implode(', ', $name).' = '.$value.' '.$limit;
          $this->query = $query;
          return true;
      }
  }
    
  protected function insertQuery($row, $value, $table, $limit)
  {
      $row = $this->protect($row);
      $value = $this->protect($value);
      $table = $this->protect($table);
      if(empty($table) || empty($row) || empty($value))
    {
        $queryError = "Error. One field is empty!";
        return $this->query = $queryError;
      }
      elseif(!array_search('*', $row)===false)
    {
        $queryError = "Error. You can't use '*' in query";
        return $this->query = $queryError;
    }
    else
    {
    $query = 'INSERT INTO '.implode(', ',$table).' ('.implode(', ',$row).') VALUES ('.implode(', ',$value).')';
      $this->query = $query;
      return true;
    }
  }
  
    protected function updateQuery($oldName, $newName, $table, $limit)
   {    $oldName = $this->protect($oldName);
        $newName = $this->protect($newName);
        $table = $this->protect($table);
  if(empty($oldName) || empty($table))
    {
        $queryError = "Error. One field is empty!";
        return $this->query = $queryError;
    }
    else
    {
    if (strlen($limit)!=0)
        $limit=" LIMIT $limit";
    $query = 'UPDATE '.implode(', ',$table). ' SET '.implode(', ',$oldName).' = '.implode(', ',$newName).' '.$limit;
      $this->query = $query;
      return true;
    }
  }
    protected function protect($value){
        $value = array_filter($value);
        $value = implode(', ', $value);
        $value = htmlspecialchars(trim($value));
        $value = explode(', ', $value);
        $value = array_filter($value);
        return $value;
    }

}
?>
