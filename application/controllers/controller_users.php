<?php

/**
* Controller for User Class
**/

class Controller_Users extends Controller {

 public function __construct() {
  $this->model = new Model_Users();
  $this->view = new View();
  $this->query = $_REQUEST;
 }

 public function action_index() {
  $data = $this->model->get_data();
  $this->view->generate('users_view.php', 'template_view.php', $data);
 }

 public function action_edit() {
  $data = $this->model->get($this->query['userid']);
  $this->view->generate('user_edit.php', 'template_view.php', $data);
 }

 public function action_changeStatus() {
  $data = $this->model->changeStatus($this->query['userid']);
  $this->view->generate('', 'ajax_view.php', $data);
 }

 public function action_create() {
  $data = $this->model->create($this->query['user']);
  $this->view->generate('', 'ajax_view.php', $data);
 }

 public function action_delete() {
  $user = $this->model->get($this->query['userid']);
  $groups = Group::find_by_scope(array('members' => $user->login));
  var_dump($groups);
  $data = $this->model->delete($user);
  $this->view->generate('', 'ajax_view.php', $data);
 }

 public function action_update() {
  $data = $this->model->update($this->query['user']);
  $this->view->generate('', 'ajax_view.php', $data);
 }
}
