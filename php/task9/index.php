<?php
require_once 'config.php';
function __autoload($class)
{
    require_once('lib/'.$class.'.php');
}

 /*
 * table
 */
$head=array('Name','Surname','Age');
$stroki=array(array('Igor','Igorev','15'),array('Vova','Ivanov','25'));
$param=array('border');
$table=HtmlHelper::table($stroki,$head,$param);

 /*
 * ul/ol 
 */
$arr=array('Lilya',array('Igor','Vasya'),'Vova','Petya','Semen');
$ul=HtmlHelper::ul($arr,'ul');

 /* 
 * select
 */
$arr=array('Igor','Vova','Petya','Semen');
$select=HtmlHelper::select($arr);

 /*
 * dl-dt-dd
 */
$data=array('Vova'=>'asd;fkljas;ldkfj;lkasjdf;laskjdfsad','Petya'=>'asdfkjlahsdfasdjflk;j');
$dl=HtmlHelper::dlDtDd($data);

 /*
 * radio
 */
$stroki=array(array('Igor','Igorev','15'),array('Vova','Ivanov','25'));
$radio=HtmlHelper::radio($stroki);

include VIEW;
?>
