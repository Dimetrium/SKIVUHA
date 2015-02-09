<?php
class Model
{   
    public $name;
    public $email;
    public $massage;
    public $subject;
    public $err;
    public $emailErr;
    
    function __construct()
    {
        $this->name = trim(strip_tags($_POST['name']));
        if (empty($_POST["email"]))
        { 
            $emailErr = "Email is required";
        } 
        else 
        {
            $this->email = trim(strip_tags($_POST['email']));
        }
        
        $this->subject = $_POST['subject'];
        $this->massage = trim(strip_tags($_POST['massage']));
    }
    
    function sendMail()
    {
        mail('skivuha@hotmail.com', $this->subject, $this->massage, $this->email);
    }
    
    function getName()
    {
        if(!preg_match("/^[a-zA-Z]+$/",$this->name))
        {
            $this->err = 'You enter wrong name format';
            return $this->err;
        }
        else
        {
            return $this->name;
        }
    }
    
    function getEmail()
    {
        if(!filter_var("$this->email", FILTER_VALIDATE_EMAIL))
        {
            $this->emailErr = 'You enter wrong name format';
            return $this->emailErr;
        }
        else
        {
            return $this->email;
        }
    }
}
?>