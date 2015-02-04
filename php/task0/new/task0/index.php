<?php

    include ('config.php'); 
    include ('lib/func.php');
    mysql_connect(HOST,USER,PASSWORD);
	mysql_select_db(DB_NAME);
	
	
    $qGenre = getGenre();
    
    $dropdown = ''; 
	foreach($qGenre as $genre){
		$dropdown .=  "<option>$genre[genrename]</option>";
    }

    $rcolor = 1;
    if (isset($_GET['show'])){
         $genre = $_GET['genre'];
         $search = $_GET['search'];
         $qShow = getShow($genre, $search);
    }

    include('templates/index.php');

?>
