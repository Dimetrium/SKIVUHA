<?php
require_once('lib/PdoTry.php');

$sql = new PdoTry;
$sqll = $sql->select()
  ->from('Book')
  ->where('BookId = 1')
  ->comm();

echo '<pre>';
var_dump($sqll);


/*
$id[':id']=1;
$db = new PDO("mysql:host=localhost;dbname=user2",'root','123');
$sql='SELECT * FROM Book WHERE BookId = :id';
//echo 'connected to db<br>';

$stmt=$db->prepare($sql);
//$stmt->bindParam(':id',$id);
$stmt->execute($id);
//$stmt->execute();
$book= $stmt->fetchAll();
echo '<pre>';
var_dump($stmt->execute($id));
 */


//$row = $stmt->fetch(PDO::FETCH_NUM);
//$q=$obj->select('BookId')->from('Book');
//include 'VIEW';

?>
