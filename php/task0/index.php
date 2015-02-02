<?php
    include 'config.php';
	mysql_connect('HOST','USER','PASSWORD');
	mysql_select_db('DB_NAME');
	
$qGenre=mysql_query("SELECT genrename FROM genre");	
while($genre=mysql_fetch_assoc($qGenre)):
include 'VIEW';