<?php

class Controller_Groups extends Controller{
 public function __construct(){
  $this->model = new Model_Groups();
  $this->view = new View();
  $this->query = $_REQUEST;
 }

 public function action_index(){
  $data = $this->model->get_data();
  $this->view->generate('groups_view.php', 'template_view.php', $data);
 }

 public function action_edit(){
  $data = $this->model->get($this->query['groupid']);
  $this->view->generate('group_edit.php', 'template_view.php', $data);
 }

 public function action_save(){
  $data = $this->model->save($this->query['groupid']);
  $this->view->generate('', 'template_view.php', $data);
 }

 public function action_delete(){
  $data = $this->model->delete($this->query['groupid']);
  $this->view->generate('', 'ajax_view.php', $data);
 }

 public function action_create(){
  $data = (!empty($this->query['groupname'])) ? $this->model->create($this->query['groupname'], $this->query['gid']) : NULL;
  $this->view->generate('', 'ajax_view.php', $data);
 }

 public function action_addMember(){
  $data = (!empty($this->query['groupid'])) ? $this->model->addMember($this->query['groupid'], $this->query['member']) : NULL;
  $this->view->generate('', 'ajax_view.php', $data);
 }

 public function action_deleteMember(){
  $data = (!empty($this->query['groupid'])) ? $this->model->deleteMember($this->query['groupid'], $this->query['member']) : NULL;
  $this->view->generate('', 'ajax_view.php', $data);
 }
}
