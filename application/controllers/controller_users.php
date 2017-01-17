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
  $this->view->generate('users_view.php', 'template_view.php', $this->model->get_data());
 }

 public function action_edit() {
  $this->view->generate('user_edit.php', 'template_view.php', $this->model->get(intval($this->query['userid'])));
 }

 public function action_changeStatus() {
  $this->view->ajax($this->model->changeStatus(intval($this->query['userid'])));
 }

 public function action_create() {
  $this->view->ajax($this->model->create($this->query['user']));
 }

 public function action_delete() {
  $user = $this->model->get(intval($this->query['userid']));
  foreach (Group::find_by_like(array('members' => $user->login)) as $group) {
   $group->delMember($user->login);
   $group->save();
  }
  $data = $this->model->delete(intval($user->userid));
  $this->view->ajax($data);
 }

 public function action_update() {
  $this->view->ajax($this->model->update($this->query['user']));
 }

 public function action_show() {
  $users = $this->model->get_data();
  foreach ($users->keys() as $userid) {
   if ($users->getItem($userid)->login == $this->query['login']) {
    $data = $users->getItem($userid);
    if (config()->QUOTA) {
     $quotalimit = Group::find_by_scope(array('name' => $data->login));
     $data->quotalimit = $quotalimit->bytes_in_avail;
    }
   }
  }
  $this->view->generate('user_show.php', 'template_view.php', $data);
 }
}
