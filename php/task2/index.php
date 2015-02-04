<pre>
<?php
include 'config.php';
function __autoload($class)
{
    include('lib/'.$class.'.php');
}
$obj = new File(SOURCE_FILE);
$text_in_file = $obj->getText();
$string = $obj->getString(0);
$sim = $obj->getSim(2,1);
$string_changes = $obj->setString(0, 'Nooooooo!');
$sim_changes = $obj->setSim(2, 1, '@');
$newfile = $obj->newFile();
include 'templates/index.php';
?>
