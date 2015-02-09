<?php
include 'config.php';	
$connect = connect_to_db();
$spisok = get_spisok();
$show = is_show();
$footer = content_footer_show($show);
$content = content_show($show);
$show = get_show($genre,$search, $show);
include VIEW;
?>