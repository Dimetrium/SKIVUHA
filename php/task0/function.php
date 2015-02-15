<?php
function connect_to_db()
{
    mysql_connect(HOST,USER,PASSWORD);
    mysql_select_db(DB_NAME);
    return true;
}

function get_content($query)
{
    if($connect===true)
        $arr=array();
        $res=mysql_query($query);
        while($row=mysql_fetch_assoc($res));
    $arr= $row; 
    return $arr;
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


function get_show($arr)
{
    $rcolor=1;
    foreach($arr as $key => $val)
    {
			if(($rcolor%CHET)==NECHET)
            {$show.="<tr style='color: white; background-color: #4a4a4a <?=first?>'>
                <td width='25%'><a style='color: white; font-weight:bold;' href='book.php?id=$val[id]'>$val[title]</a></td>";}
			else  
            {$show.="<tr style='color: black; background-color: #cacaca <?=second?>'>
				<td width='25%'><a style='color: black; font-weight:bold;' href='book.php?id=$val[id]'>$val[title]</a></td>";}
			$show.="<td width='20%'>$val[authorname]</td><td width='13%'>$val[genrename]</td><td width='40%'>$val[description]</td>
					<td width='2%'>$val[price]</td></tr>";
			$rcolor++;
	}
            return $show;
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