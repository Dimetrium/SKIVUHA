<?php
define('CONTROLLER', 'functions.php');
define('VIEW', 'templates/index.php');
$tmp_name = $_FILES['user_file']['tmp_name'];
$name = $_FILES['user_file']['name'];
define('DIR', "files/$name");
define('DIR_DEST', "files/");
$count=1;
?>