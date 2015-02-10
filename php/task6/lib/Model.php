<?php
class Model
{   
    private $err;
    private $emailErr;
    private $massageErr;
    private $subjectErr;
    private $send_mail;
    private $name;
    private $email;
    private $massage;
    private $select;
    private $selected_first;
    private $selected_second;
    
    public function __construct()
   {

   }
    function __set($property, $val)
    {
      if(property_exists($this, $property))
        $this->$property=$val;
    }

	public function getArray()
   {	
		return array('%TITLE%'=>'Contact Form', '%ERRORS_NAME%'=>$this->err, '%ERRORS_EMAIL%'=>$this->emailErr, '%NAME%'=>$this->name, '%EMAIL%'=>$this->email, '%MASSAGE%'=>$this->massage, '%ERRORS_MASSAGE%'=>$this->massageErr, '%ERRORS_SUBJECT%'=>$this->subjectErr, '%SELECTED_FIRST%'=>$this->selected_first, '%SELECTED_SECOND%'=>$this->selected_second, '%ERRORS_SEND%'=>$this->send_mail);
   }
	           
	public function checkForm()
	{
        $this->name = trim(strip_tags($_POST['name']));
        $this->email = trim(strip_tags($_POST['email_cli']));
        $this->massage = trim(strip_tags($_POST['massage']));
        $this->select = trim(strip_tags($_POST['select']));
        
        if(empty($this->name))
            {$this->err = 'Need name!';}
        elseif(!preg_match("/^[a-zA-Z ]*$/", $this->name))
            {$this->err = 'Wrong name!';}
        else
            {$name->name;}
        
        if(empty($this->email))
           {$this->emailErr = 'Need e-mail!';}
        elseif(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
            {$this->emailErr = 'Wrong e-mail!';}
        else
           {$this->email;}
        
        if(empty($this->massage))
            {$this->massageErr = 'Need massage!';}
        else
            {$this->massage = wordwrap($this->massage, 70, "\r\n");}
        
        if($this->select=='null')
            {$this->subjectErr = 'Choise subject';}
        
        if($this->select=='first')
            {$this->selected_first = 'selected';}
        
        if($this->select=='second')
            {$this->selected_second = 'selected';}
        
        if(is_null($this->err) && is_null($this->emailErr) && is_null($this->massageErr) && is_null($this->subjectErr))
            {return true;}
        else
            {return false;}

        
    }
   
	public function sendEmail()
	{
        $browser = '';
        if(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox'))
            {$browser = 'firefox';}
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome'))
            {$browser = 'chrome';}
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 8.0'))
            {$browser = 'ie8';}
        elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera'))
            {$browser = 'opera';}
        else
            {$browser = 'unknow browser';}
            
        $headers = "From: $this->email \r\n"."Reply-To: $this->email \r\n";
        $ip = $_SERVER["REMOTE_ADDR"];
        $send = mail(TO, $this->select,"$this->massage\r\nBest Regards,
$this->name\r\nip: $ip\r\nBrowser: $browser", $headers);   
		return $send;
	}		
    
}
