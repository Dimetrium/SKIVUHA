<?php
include 'config.php';	
$connect = connect_to_db();
$spisok = get_spisok();
$spisok = set_spisok($spisok);
$show = is_show();
$footer = content_footer_show($show);
$content = content_show($show);
$show = get_show($genre,$search, $show);
$show = set_show($show);
include VIEW;
?>