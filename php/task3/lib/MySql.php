<?php
class MySql extends Sql
{
    function __construct(){
        if(DEMO === false)
        {
        mysql_connect(HOST, USER, PASSWORD);
        mysql_select_db(DB_NAME);
        }
        else return true;
    }
        
    function selectQuery($row, $table, $limit)
    {
        parent::selectQuery($row, $table,$limit);
        if(DEMO === true)
            return __Class__.__Method__.$this->query;
        else
        {
           $res = mysql_query($this->query);
           $arr=array();
           $row = mysql_fetch_assoc($res);
           foreach($row as $arr)
             $arr=$a;
           return $this->query = $arr;
        }
    }
    
    function deleteQuery($row, $name, $value, $limit)
    {
        parent::deleteQuery($row, $name, $value,$limit);
        if(DEMO === true)
            return __Class__.__Method__.$this->query;
        else
        {
           $res = mysql_query($this->$query);
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
           $res = mysql_query($this->$query);
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
           $res = mysql_query($this->$query);
           return true;
        }
    
    }
    function __destruct()
    {
        if (DEMO === false)
            mysql_close();
    }

}

?>
