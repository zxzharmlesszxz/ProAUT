<?php

class Controller_Quotalimits extends Controller{

 public function __construct(){
  $this->model = new Model_Quotalimits();
  $this->view = new View();
  $this->query = $_REQUEST;
 }
 
 public function action_index()
 {
  $data = $this->model->get_data();  
  $this->view->generate('quotalimits_view.php', 'template_view.php', $data);
 }

 public function action_edit(){
  $data = $this->model->get_quotalimit($this->query['quotalimitid']);
  $this->view->generate('quotalimit_edit.php', 'template_view.php', $data);
 }

 public function action_save(){
  $data = $this->model->save_quotalimit($this->query['quotalimitid']);
  $this->view->generate('quotalimit_save.php', 'template_view.php', $data);
 }

 public function action_delete(){
  $data = $this->model->delete_quotalimit($this->query['quotalimitid']);
  $this->view->generate('quotalimit_delete.php', 'ajax_view.php', $data);
 }

 public function action_create(){
  $data = (!empty($this->query['quotalimit'])) ? $this->model->create_quotalimit($this->query['quotalimit']) : NULL;
  $this->view->generate('quotalimit_create.php', 'ajax_view.php', $data);
 }
}