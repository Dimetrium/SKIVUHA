<?php include 'header.php';?>
<?php echo $title_table1 . $genre[genrename] . $title_table2;?>	
<?php endwhile ?>	
<?php	
if(isset($_GET['show'])):
$genre = $_GET[genre];
$search = $_GET[search];
$test=show($genre,$search);    
?>   
  
 

			    <table width="100%" cellpadding="5px">
				<th>Название</th>
				<th>Автор</th>
				<th>Жанр</th>
				<th>Описание</th>
				<th>Цена</th>			
<?php $rcolor=1;
    while($show=mysql_fetch_assoc($qShow)):
	    if(($rcolor%CHET)==NECHET): ?>
                <tr style='color: white; background-color: #4a4a4a'>
				<td width='25%'><a style='color: white; font-weight:bold;' href='book.php?id=$show[id]'>$show[title]</a></td>
<?php else:?>  
                <tr style='color: black; background-color: #cacaca'>
				<td width='25%'><a style='color: black; font-weight:bold;' href='book.php?id=$show[id]'>$show[title]</a></td>
		
					<td width='20%'>$show[authorname]</td>
					<td width='13%'>$show[genrename]</td>
					<td width='40%'>$show[description]</td>
					<td width='2%'>$show[price]</td>
				</tr>

<?php endif;?>
<?php $rcolor++;?> 
<?php endwhile ?>
        </table>

<?php else: ?>
<?php include 'footer.php'?>