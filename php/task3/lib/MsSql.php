<?php
class MySql extends Sql
{
    function __construct(){
        if(DEMO === false)
        {
        mysql_connect('localhost', 'root', '') or die('no coon');
        mysql_select_db(table)or die('no con to DB');
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
           $res = mysql_query($this->query);
           $a=array();
            $row = mysql_fetch_assoc($res);
            foreach($row as $a)
            $a=$a;
        }
    }
    
    function deleteQuery($row, $name, $value,$start=0, $end=10)
    {
        parent::deleteQuery($row, $name, $value,$start=0, $end=10);
        if(DEMO === true)
            return __Class__.__Method__.$this->query;
        else
        {
           $res = mysql_query($this->$query);
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
           $res = mysql_query($this->$query);
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