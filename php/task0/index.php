<?php
include 'config.php';
$genre='';
$search='';
$connect = connect_to_db();
$spisok = get_content('SELECT genrename FROM genre');
    foreach($spisok as $genrename)
        $spisok.="<option>$genrename</option>";
$show = is_show();
$query="SELECT b.id, b.title, GROUP_CONCAT(DISTINCT a.authorname SEPARATOR ', ') AS authorname,
				GROUP_CONCAT(DISTINCT g.genrename SEPARATOR ', ') AS genrename,
				b.description, b.price FROM book b JOIN book_author ba ON ba.bookid=b.id 
			JOIN author a ON a.id=ba.authorid JOIN book_genre bg ON bg.bookid=b.id JOIN genre g 
				ON g.id=bg.genreid WHERE g.genrename LIKE '$genre' AND	(b.title LIKE '$search' 
				OR a.authorname LIKE '$search') GROUP BY b.title";
$show = get_content($query);
$show = get_show($show);
$footer = content_footer_show($show);
$content = content_show($show);
$show = get_show($genre,$search, $show);
include VIEW;
?>