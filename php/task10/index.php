<?php
include('lib/PdoTry.php');



 $db = new PDO("mysql:host=localhost;dbname=user2",'root','123');
echo 'connected to db<br>';
$sql='SELECT * FROM Book';
$stmt=$db->query($sql);
$row = $stmt->fetch(PDO::FETCH_NUM);
var_dump($row);

//$q=$obj->select('BookId')->from('Book');

//include 'VIEW';

?>
