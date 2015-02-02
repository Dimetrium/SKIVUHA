<?php
include config.php;	
include functions.php;
mysql_connect(HOST,USER,PASSWORD);
mysql_select_db(DB_NAME);

echo "<option>$genre[genrename]</option>";?>

</select></td>
<td><br><input type="submit" name="show" value="Показать"/></td>
</form></tr>
</table><br>
<?
$talbe1 = "<tr style='color: white; background-color: #4a4a4a'>
        	<td width='25%'><a style='color: white; font-weight:bold;' href='book.php?id=$show[id]'>$show[title]</a></td>";
    
if(isset($_GET['show'])){
$genre = $_GET[genre];
$search = $_GET[search];
$test = show($genre,$search);
while($show=mysql_fetch_assoc($qShow)){
    if(($rcolor%CHET)==NECHET) echo
			else echo "<tr style='color: black; background-color: #cacaca'>
						<td width='25%'><a style='color: black; font-weight:bold;' href='book.php?id=$show[id]'>$show[title]</a></td>";
$rcolor++;
}
include 'templates/index.php';:
?>
