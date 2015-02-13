<?php

class IndexController extends ControllerBase
{

  public function indexAction()
  {
    $data = Anketa::find();
    $this->view->setVar('data', array('data' => $data, 'operation' => addAnketa));
  }

  public function addAnketaAction()
  {
    $request = new Phalcon\Http\Request();
    $anketa = new Anketa();
    $anketa->firstName = $request->getPost("firstName");
    $anketa->lastName = $request->getPost("lastName");
    $anketa->age = $request->getPost("age");
    $anketa->description = $request->getPost("description");
    $anketa->save();
    $this->response->redirect('');
  }



  public function deleteAnketaAction($id)
  {
    $anketa = Anketa::findFirst($id);
    $anketa->delete();
    $this->response->redirect('');

  }

  public function editAnketaAction($id)
  {
    $request = new Phalcon\Http\Request();

    if ($request->isPost() == true)
    {
      $anketa = Anketa::findFirst($id);
      $anketa->firstName = $request->getPost("firstName");
      $anketa->lastName = $request->getPost("lastName");
      $anketa->age = $request->getPost("age");
      $anketa->description = $request->getPost("description");
      $anketa->save();
      $this->response->redirect('');
    }
    else
    {
      $anketa = Anketa::findFirst($id);
      $data = Anketa::find();
      $this->view->setVar('data', array('data' => $data, 'operation' => 'editAnketa/' . $id, 'anketa' => $anketa));
      $this->view->pick('index/index');
    }
  }

}

