<?php
if($_POST)
    $serch= $_POST[name];
	$url = "https://www.google.ru/search?num=10&q=$serch";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_USERAGENT, "");
	curl_setopt($ch, CURLOPT_FAILONERROR, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_REFERER, "http://www.google.ru/"); 
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);

	curl_setopt($ch, CURLOPT_POST, 0);

	$data_url = $data_title = $data_description = curl_exec($ch);
	preg_match_all("/<cite>(.+?)<\/cite>/is",$data_url,$matches_url); 
	preg_match_all('/<h3 class="r">(.+?)<\/h3>/is',$data_title,$matches_title);
	preg_match_all('/<span class="st">(.+?)<\/span>/is',$data_description,$matches_description);
	
	$text_title = implode("[space]", $matches_title[0]);
	$text_title = strip_tags($text_title);
	$text_title_array = explode("[space]", $text_title);
	
	
	$description = implode("[space]",$matches_description[0]);
	$description = strip_tags($description);
	$description_array = explode("[space]", $description);
	
	$url_array = $matches_url[1];
	
	$final_array['titles'] = $text_title_array;
	$final_array['urls'] = $url_array;
	$final_array['descriptions'] = $description_array;
 
foreach($text_title_array as $key=>$val)
    {foreach($url_array as $key2=>$url){
    if($key == $key2)
    {$echo.='<a href="'.$url.'">'.$val.'</a><br>';
    $echo.='<dl><dt>'.$url.'</dt><dd>'.$final_array['descriptions'][$key2].'</dd></dl>';
    }}}

    

include 'templates/index.php';

?>
