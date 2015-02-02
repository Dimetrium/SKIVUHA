<?php
function show($genre,$search){
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
				g.genrename LIKE '%$genre%' 
				AND				
				(b.title LIKE '%$search%' 
				OR
				a.authorname LIKE '%$search%')
		 	GROUP BY 
				b.title
		";
$qShow=mysql_query($query);
return $qShow;
}
?>