<?php
class MsSql extends Sql
{
    function __construct(){
        if(DEMO === false)
        {
        mssql_connect(HOST, USER,PASSWORD);
        mssql_select_db(DB_NAME);
        }
        else return true;
    }
        
    function selectQuery($row, $table,$start=0, $end=10)
    {
        parent::selectQuery($row, $table,$start=0, $end=10);
        if(DEMO === true)
            return __Class__.__Method__.$this->query;
        else
        {
           $res = mssql_query($this->query);
           $arr=array();
            $row = mssql_fetch_assoc($res);
            foreach($row as $arr)
              $query=$arr;
            return $this->query = $query;
        }
    }
    
    function deleteQuery($row, $name, $value,$start=0, $end=10)
    {
        parent::deleteQuery($row, $name, $value,$start=0, $end=10);
        if(DEMO === true)
            return __Class__.__Method__.$this->query;
        else
        {
           $res = mssql_query($this->$query);
           return true;
        }
    
    }
    
    function insertQuery($row, $value, $table,$start=0, $end=10)
    {
        parent::insertQuery($row, $value, $table,$start=0, $end=10);
        if(DEMO === true)
            return __Class__.__Method__.$this->query;
        else
        {
           $res = mssql_query($this->$query);
           return true;
        }
    }
    
    function updateQuery($oldName, $newName, $table, $start=0, $end=10)
    {
    parent::updateQuery($oldName, $newName, $table, $start=0, $end=10);
       
       if(DEMO === true)
       return __Class__.__Method__.$this->query;
       else
        {
           $res = mssql_query($this->$query);
           return true;
        }
    
    }
    function __destruct()
    {
        if (DEMO === false)
            mssql_close();
    }

}

?>
