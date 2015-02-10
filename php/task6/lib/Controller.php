<?php
class Controller
{
  private $model;
  private $view;

  public function __construct()
  {		
    $this->model = new Model();
    $this->view = new View(TEMPLATE);	

    if(isset($_POST['email']))
    {	
      $this->pageSendMail();
    }
    else
    {
      $this->pageDefault();	
    }

    $this->view->templateRender();			
  }	

  private function pageSendMail()
  {
    if($this->model->checkForm() === true)
    {
      $this->model->sendEmail();
    }
    $mArray = $this->model->getArray();		
    $this->view->addToReplace($mArray);	
  }	

  private function pageDefault()
  {   
    $mArray = $this->model->getArray();
    $this->view->addToReplace($mArray);			   
  }				
}





//-----------------------------------
/*$post = new Model;

$obj = new View;

var_dump($post->getEmail());

$obj->setKey('%TITLE%','My mail form');
$obj->setKey('%NAME%', $post->name);
$obj->setKey('%EMAIL%', $post->email);
$obj->setKey('%MASSAGE%', $post->massage);
$obj->setKey('%DROPDOWN%', $post->dropdown);
$obj->setKey('%AGENT%', $_SERVER[HTTP_USER_AGENT]);
$obj->setKey('%IP%', $_SERVER[REMOTE_ADDR]);

$obj->setShablon('templates/index.php');
$obj->chengeShablonKey();

echo $obj->shablon;
*/
?>