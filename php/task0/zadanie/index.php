<?php
	mysql_connect('localhost','root','');
	mysql_select_db('books');
	
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Книжный Каталог</title>
<meta name="" content="">
<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
</head>
<body>

<div id="admin_button"><a class="admin" style="background-color: red;" href="admin.php">Администратор</a></div>
<div id="header"><a id="header_link" href="index.php">Книжный Каталог</a></div>
<div id="content">
<?php
	$qGenre=mysql_query("SELECT genrename FROM genre");	
	
	echo '
		<table style="margin: auto;">	
			<tr>
			<form method="GET" action="index.php">
			<td>Название/Автор:<br>
				<input type="text" name="search"/></td>
			<td>Жанр:<br>
				<select name="genre">
				<option value="">Любой</option>';
	while($genre=mysql_fetch_assoc($qGenre)){
		echo "<option>$genre[genrename]</option>";
	}	
	echo '		</select></td>
			<td><br><input type="submit" name="show" value="Показать"/></td>
			</form></tr>
		</table><br>
	';
	if(isset($_GET['show'])){
		$qShow=mysql_query("
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
				g.genrename LIKE '%$_GET[genre]%' 
				AND				
				(b.title LIKE '%$_GET[search]%' 
				OR
				a.authorname LIKE '%$_GET[search]%')
		 	GROUP BY 
				b.title
		");
		echo '
			<table width="100%" cellpadding="5px">
				<th>Название</th>
				<th>Автор</th>
				<th>Жанр</th>
				<th>Описание</th>
				<th>Цена</th>			
		';
		$rcolor=1;
		while($show=mysql_fetch_assoc($qShow)){
			if(($rcolor%2)==1) echo "<tr style='color: white; background-color: #4a4a4a'>
									<td width='25%'><a style='color: white; font-weight:bold;' href='book.php?id=$show[id]'>$show[title]</a></td>";
			else echo "<tr style='color: black; background-color: #cacaca'>
						<td width='25%'><a style='color: black; font-weight:bold;' href='book.php?id=$show[id]'>$show[title]</a></td>";
			echo "				
					<td width='20%'>$show[authorname]</td>
					<td width='13%'>$show[genrename]</td>
					<td width='40%'>$show[description]</td>
					<td width='2%'>$show[price]</td>
				</tr>
			";
			$rcolor++;
		};
		echo '</table>';		
	}
	else echo'
		<div style="text-align: left;">
		Сделать простой книжный каталог.<br><br> 
		Условия заказчика:<br>
		Нужно создать веб интерфейс администратора для внесения/редактирования названий книг (и краткого описания о чем книга), цен, авторов и жанров.<br><br>
		Пользователь интернета должен уметь:
		<ol>	
			<li>Посмотреть список книг выбирая жанр (книга может принадлежать разным жанрам);</li>
			<li> Посмотреть список книг выбрав автора (книга может принадлежать разным авторам);</li>
			<li> Посмотреть страницу с детальной информацией о понравившейся книге;</li>
			<li> На этой же странице пользователь должен иметь возможность отправить форму заказа этой книги с полями - Адрес, ФИО, Количество экземпляров.
		Эта форма отправит письмо админу с информацией о книге и информацию о заказчике.</li>	
		</ol>
		 Дополнительная информация:
		<ul>
			<li> вход в админ часть сделать с помощью .htaccess, информацию о логин/пароле администратора в БД хранить не нужно;</li>
			<li> жанры книг одноуровневые, вложений нет;</li>
			<li> хранить информацию о пользователях сайта не нужно;</li>
			<li> информацию о заказах книг хранить в БД не нужно, она должна оставаться в письмах;</li>
		</ul>
		</div>
	';

?>
</div>
</body>
</html>