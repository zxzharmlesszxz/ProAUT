<?php

class Controller_Quotalimits extends Controller{
 protected $query;
 
 public function __construct(){
  parent::__construct();
  $this->model = new Model_Quotalimits();
  $this->query = $_REQUEST;
 }

 public function action_index(){
  $this->view->generate('quotalimits_view.php', 'template_view.php', $this->model->get_data());
 }

 public function action_edit(){
  $this->view->generate('quotalimit_edit.php', 'template_view.php', $this->model->get(intval($this->query['quotalimitid'])));
 }

 public function action_save(){
  $this->view->ajax($this->model->save(intval($this->query['quotalimitid'])));
 }

 public function action_delete(){
  $this->view->ajax($this->model->delete(intval($this->query['quotalimitid'])));
 }

 public function action_create(){
  $this->view->ajax(((!empty($this->query['quotalimit'])) ? $this->model->create($this->query['quotalimit']) : NULL));
 }

 public function action_update() {
  $this->view->ajax($this->model->update($this->query['quotalimit']));
 }
}
