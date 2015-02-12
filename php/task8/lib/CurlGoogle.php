<?php
class CurlGoogle
{
    private $url;
    public $data_url;
    public $data_name;
    public $data_text;
    
    function __construct($name)
    {
        $this->url = "https://www.google.ru/search?num=10&q=$name";
    }
        
    function getContent()
    {
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
        $this->name = curl_exec($ch);
        $this->text = curl_exec($ch);
        $this->url = curl_exec($ch);
    }
}


	
	

