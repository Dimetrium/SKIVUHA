<?php
include 'config.php';
include 'lib/CurlGoogle.php';
$echo='';
if($_POST)
{
  $search = str_replace(' ', '+', $_POST['name']);
  $obj_curl=new CurlGoogle($search);
	foreach($obj_curl->getName() as $key=>$val)
	{
		foreach($obj_curl->getUrl() as $key2=>$url)
		{
			if($key == $key2)
			{
				$echo.='<a href="http://'.strip_tags($url).'">'.$val.'</a><br>';
				$echo.='<dl><dt>'.$url.'</dt><dd>'.$obj_curl->getShortText()[$key2].'</dd></dl>';
			}
		}
	}
}
include VIEW;

