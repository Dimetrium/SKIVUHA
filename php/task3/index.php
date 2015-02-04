<?
include 'config.php';
function __autoload($class)
{
  include('lib/'.$class.'.php');
}




include VIEW;
?>
