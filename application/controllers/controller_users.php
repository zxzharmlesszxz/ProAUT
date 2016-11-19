<?php

class Controller_Users extends Controller{

 public function __construct(){
  $this->model = new Model_Users();
  $this->view = new View();
  $this->query = $_REQUEST;
 }

 public function action_index(){
  $data = $this->model->get_data();
  $this->view->generate('users_view.php', 'template_view.php', $data);
 }

 public function action_edit(){
  $data = $this->model->get_user($this->query['userid']);
  $this->view->generate('user_edit.php', 'template_view.php', $data);
 }

 public function action_changeStatus(){
  $data = $this->model->changeStatus($this->query['userid']);
  $this->view->generate('user_changeStatus.php', 'ajax_view.php', $data);
 }

 public function action_add(){
  $data = $this->model->add($this->query['user']);
  $this->view->generate('user_add.php', 'ajax_view.php', $data);
 }

 public function action_delete(){
  $data = $this->model->delete($this->query['userid']);
  $this->view->generate('user_delete.php', 'ajax_view.php', $data);
 }

 public function action_update(){
  $data = $this->model->update($this->query['user']);
  $this->view->generate('user_update.php', 'ajax_view.php', $data);
 }
}