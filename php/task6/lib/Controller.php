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
      if($this->model->sendEmail()===false)
        {$this->model->send_mail = 'Error. Mail no send';}
      else
        {$this->pageDefault();}
    }
    $mArray = $this->model->getArray();		
    $this->view->addToReplace($mArray);	
  }	

  private function pageDefault()
  { 
         $this->model->send_mail = 'Mail was sended!';
         $this->model->name = '';
         $this->model->email = '';
         $this->model->massage = '';
         $this->model->select = 'selected';
         $this->model->selected_first = '';
         $this->model->select_second = '';

    
    $mArray = $this->model->getArray();
    $this->view->addToReplace($mArray);			   
  }				
}
