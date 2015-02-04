<?php
class Sql
{
  public $arr;
  public $query;

  function selectQuery($row, $table)
  {
   
    $query = "SELECT $row FROM $table"
      return $this->query;
  }

  function insertQuery($row, $values, $table)
  {
    "INSERT INTO $table ($row) VALUES ($values)"
      
      return $this->query;
  
  }

  function deleteQuery($row, $table)
  {
    "DELETE $row FROM $table"
  
      return $this->query;
  }


}

?>
