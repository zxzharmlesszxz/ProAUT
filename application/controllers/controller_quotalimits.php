<?php

class Controller_Quotalimits extends Controller{
 protected $query;
 
 public function __construct(){
  parent::__construct();
  $this->model = new Model_Quotalimits();
  $this->query = $_REQUEST;
 }

 public function action_index(){
  $data = $this->model->get_data();
  $this->view->generate('quotalimits_view.php', 'template_view.php', $data);
 }

 public function action_edit(){
  $data = $this->model->get($this->query['quotalimitid']);
  $this->view->generate('quotalimit_edit.php', 'template_view.php', $data);
 }

 public function action_save(){
  $data = $this->model->save($this->query['quotalimitid']);
  $this->view->ajax($data);
 }

 public function action_delete(){
  $data = $this->model->delete($this->query['quotalimitid']);
  $this->view->ajax($data);
 }

 public function action_create(){
  $data = (!empty($this->query['quotalimit'])) ? $this->model->create($this->query['quotalimit']) : NULL;
  $this->view->ajax($data);
 }
}
