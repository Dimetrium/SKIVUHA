<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB_NAME', 'books');
define('VIEW', 'templates/index.php');
$title_table1='
<table style="margin: auto;">	
    <tr><form method="GET" action="index.php">
        <td>Название/Автор:<br>
        <input type="text" name="search"/></td>
		<td>Жанр:<br>
		<select name="genre">
		<option value="">Любой</option>
		<option>';
$title_table2='
    </option>;
		</select></td>
		<td><br><input type="submit" name="show" value="Показать"/></td>
	</form></tr>
</table><br>';
define('CHET', 2);
define('NECHET', 1);
?>