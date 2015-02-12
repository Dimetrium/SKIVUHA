<?php
include 'lib/CurlGoogle.php';

if($_POST)
{
    $obj_curl=new CurlGoogle($_POST['name']);
    $content=$obj_curl->getContent();
    
  preg_match_all("/<cite>(.+?)<\/cite>/is",$obj_curl->data_url,$matches_url); 
	preg_match_all('/<h3 class="r">(.+?)<\/h3>/is',$obj_curl->data_name,$matches_name);
	preg_match_all('/<span class="st">(.+?)<\/span>/is',$obj_curl->data_text,$matches_text);
    
    $text_title = implode("[space]", $matches_name[0]);
	$text_title = strip_tags($text_title);
	$text_title_array = explode("[space]", $text_title);
	
	
	$description = implode("[space]",$matches_text[0]);
	$description = strip_tags($description);
	$description_array = explode("[space]", $description);
	
	$url_array = $matches_url[1];
    
    $final_array['titles'] = $text_title_array;
	$final_array['urls'] = $url_array;
	$final_array['descriptions'] = $description_array;
 var_dump($url_array);
 
foreach($text_title_array as $key=>$val)
    {foreach($url_array as $key2=>$url){
    if($key == $key2)
    {$echo.='<a href="http://'.strip_tags($url).'">'.$val.'</a><br>';
    $echo.='<dl><dt>'.$url.'</dt><dd>'.$final_array['descriptions'][$key2].'</dd></dl>';
    }}}
}
include 'templates/index.php';
?>
