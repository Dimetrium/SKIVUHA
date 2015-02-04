<?php
    
    function getGenre(){
    
        $str = 'SELECT genrename FROM genre';
        $sql = mysql_query($str);
        $rezult = db_rezult_to_array($sql);
        $return $rezult;    
    }


function getShow($genre, $search)
{
$str = "
			SELECT
				b.id,
				b.title,
				GROUP_CONCAT(DISTINCT a.authorname SEPARATOR ', ') AS authorname,
				GROUP_CONCAT(DISTINCT g.genrename SEPARATOR ', ') AS genrename,
				b.description,
				b.price 
			FROM 
				book b 
			JOIN 
				book_author ba 
				ON 
				ba.bookid=b.id 
			JOIN 
				author a 
				ON 
				a.id=ba.authorid 
			JOIN 
				book_genre bg 
				ON 
				bg.bookid=b.id 
			JOIN 
				genre g 
				ON 
				g.id=bg.genreid
			WHERE				
				g.genrename LIKE '%$genre%' 
				AND				
				(b.title LIKE '%$search%' 
				OR
				a.authorname LIKE '%$search%')
		 	GROUP BY 
				b.title
                ";

$sql = mysql_query($str);
$rezult = db_rezult_to_array($sql);

return $rezult;

}

function db_result_to_array($result){
            
     $res_array = array();
     $count = 0;
         while ($row = mysql_fetch_assoc($result)){
             $res_array[$count] = $row;
             $count++;
     }
     return $res_array;
 }

    
    

