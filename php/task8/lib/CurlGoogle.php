<?php
class CurlGoogle
{
    private $url;
    private $data_url;
    private $data_name;
    private $data_text;
    private $short_name;
    private $text;
    private $format;
    private $url_format;
    
    function __construct($name)
    {
        $this->url = "https://www.google.ru/search?num=10&q=$name";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$this->url);
        curl_setopt($ch, CURLOPT_USERAGENT, "");
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_REFERER, "http://www.google.ru/"); 
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POST, 0);
        $this->data_name = iconv('CP1251', 'UTF-8', curl_exec($ch));
        $this->data_text = iconv('CP1251', 'UTF-8', curl_exec($ch));
        $this->data_url = iconv('CP1251', 'UTF-8', curl_exec($ch));
	    
    }

	private function formatContent($key, $source)
	{
        	$this->format=implode($key, $source);
		$this->format=strip_tags($this->format);
		$this->format=explode($key, $this->format);
	return $this->format;
	}
	
	public function getUrl()
	{
        	preg_match_all("/<cite>(.+?)<\/cite>/is",$this->data_url, $this->url_format);
		$this->url_format= $this->url_format[1];
	return $this->url_format; 
	}
	
	public function getName()
	{
		preg_match_all('/<h3 class="r">(.+?)<\/h3>/is',$this->data_name, $this->short_name);
		$this->short_name=$this->formatContent("[blabla]", $this->short_name[0]);
	return $this->short_name;
	}		

	public function getShortText()
	{
		preg_match_all('/<span class="st">(.+?)<\/span>/is',$this->data_text, $this->text);
		$this->text['text']=$this->formatContent("[blabla]", $this->text[0]);
	return $this->text['text'];
	}		
}
