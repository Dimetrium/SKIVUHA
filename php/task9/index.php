<?php
include 'config.php';
function __autoload($class)
{
    include('lib/'.$class.'.php');
}
/* parametr for table */
$head=array('Name','Surname','Age');
$stroki=array(array('Igor','Igorev','15'),array('Vova','Ivanov','25'));
$param=array('border');
/* table */
$table=HtmlHelper::table($stroki,$head,$param);

/* parametr for ul/ol */
$arr=array('Igor','Vova','Petya','Semen');
/* ul/ol */
$ul=HtmlHelper::ul($arr,'ul');

/* parametr for select */
$arr=array('Igor','Vova','Petya','Semen');
/* select */
$select=HtmlHelper::select($arr);

/* parametr for dl-dt-dd */
$data=array('Vova'=>'asd;fkljas;ldkfj;lkasjdf;laskjdfsad','Petya'=>'asdfkjlahsdfasdjflk;j');
/* dl-dt-dd */
$dl=HtmlHelper::dl_dt_dd($data);

/* parametr for radio */
$stroki=array(array('Igor','Igorev','15'),array('Vova','Ivanov','25'));
/* radio */
$radio=HtmlHelper::radio($stroki);

include VIEW;
?>
