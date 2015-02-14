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
