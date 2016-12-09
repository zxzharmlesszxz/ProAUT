<?php

/**
* Controller for User Class
**/

class Controller_Users extends Controller {
 protected $query;

 public function __construct() {
  parent::__construct();
  $this->model = new Model_Users();
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
  $this->view->ajax($data);
 }

 public function action_create() {
  $data = $this->model->create($this->query['user']);
  $this->view->ajax($data);
 }

 public function action_delete() {
  $user = $this->model->get($this->query['userid']);
  foreach (Group::find_by_like(array('members' => $user->login)) as $group) {
   $group->delMember($user->login);
   $group->save();
  }
  $data = $this->model->delete($user->userid);
  $this->view->ajax($data);
 }

 public function action_update() {
  $data = $this->model->update($this->query['user']);
  $this->view->ajax($data);
 }
}
