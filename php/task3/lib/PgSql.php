<?php
class PgSql extends Sql
{
    private $connect;
    
    function __construct(){
        if(DEMO === false)
        {
        $this->connect = pg_connect('host='.'localhost'.', dbname='.'table'.', user='.'root'.', user password='.'');
        }
        else return true;
    }
        
    function selectQuery($row, $table, $limit)
    {
        parent::selectQuery($row, $table, $limit);
        if(DEMO === true)
            return __Class__.__Method__.$this->query;
        else
        {
           $res = pg_query($this->connect ,$this->query);
           $arr=array();
            $row = pg_fetch_array($res);
            foreach($row as $res)
            $arr[]=$res;
            return $this->query = $arr;
        }
    }
    
    function deleteQuery($row, $name, $value, $limit)
    {
        parent::deleteQuery($row, $name, $value, $limit);
        if(DEMO === true)
            return __Class__.__Method__.$this->query;
        else
        {
           $res = pg_query($this->$query);
           return true;
        }
    }
    
    function insertQuery($row, $value, $table, $limit)
    {
        parent::insertQuery($row, $value, $table, $limit);
        if(DEMO === true)
            return __Class__.__Method__.$this->query;
        else
        {
           $res = pg_query($this->$query);
           return true;
        }
    
    }
     
        function updateQuery($oldName, $newName, $table, $limit)
    {
    parent::updateQuery($oldName, $newName, $table, $limit);
       
       if(DEMO === true)
       return __Class__.__Method__.$this->query;
       else
        {
           $res = pg_query($this->$query);
           return true;
        }
    
    }
    function __destruct()
    {
        if (DEMO === false)
            pg_close($this->connect);
    }

}

?>
