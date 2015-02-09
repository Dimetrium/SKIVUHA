<?php
function connect_to_db()
{
    mysql_connect(HOST,USER,PASSWORD);
    mysql_select_db(DB_NAME);
    return true;
}

function get_spisok()
{
    if($connect===true)
        $res=mysql_query("SELECT genrename FROM genre");
        while($genre=mysql_fetch_assoc($res));
    $spisok.= "<option>$genre[genrename]</option>";
    return $spisok;
    else
    return false;
}

function is_show()
{   
    global $genre, $search;
    if(isset($_GET['show']))
    {
        $genre = mysql_real_escape_string(trim($_GET[genre]));
        $search = mysql_real_escape_string(trim($_GET[search]));
        return true;
    }
    else
        return false;
}

function get_show($genre,$search, $show)
{
    global $first,$second;
    if($show===true)
    {
        $query="SELECT
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
				g.genrename LIKE '$genre' 
				AND				
				(b.title LIKE '$search' 
				OR
				a.authorname LIKE '$search')
		 	GROUP BY 
				b.title
		  ";
        $qShow=mysql_query($res);
        $arr=array();
        $rcolor=1;
		while($show=mysql_fetch_assoc($qShow))
        {
            if(($rcolor%CHET)==NECHET)
            {
                $first = '';
                $second = 'display: none;';
            }
            else
            {
                $first = 'display: none;';
                $second = '';
            }
            $rcolor++;
            $arr=$show;
        }
            return $arr;
    }
    else
        return false;
}

function content_footer_show($rez)
{
    if($rez===true)
        $show = 'display: none';
        return $show;
    else
        $show = ''
        return $show;
}

function content_show($rez)
{
    if($rez===true)
        $show = '';
        return $show;
    else
        $show = 'display: none';
        return $show;
}
?>