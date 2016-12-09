<?php

class Controller_Groups extends Controller{
 protected $query;
 
 public function __construct(){
  parent::__construct();
  $this->model = new Model_Groups();
  $this->query = $_REQUEST;
 }

 public function action_index(){
  $data = $this->model->get_data();
  $this->view->generate('groups_view.php', 'template_view.php', $data);
 }

 public function action_edit(){
  $data = $this->model->get(intval($this->query['groupid']));
  $this->view->generate('group_edit.php', 'template_view.php', $data);
 }

 public function action_save(){
  $data = $this->model->save(intval($this->query['groupid']));
  $this->view->ajax($data);
 }

 public function action_delete(){
  $data = $this->model->delete(intval($this->query['groupid']));
  $this->view->ajax($data);
 }

 public function action_create(){
  $data = (!empty($this->query['groupname'])) ? $this->model->create($this->query['groupname'], intval($this->query['gid'])) : NULL;
  $this->view->ajax($data);
 }

 public function action_addMember(){
  $data = (!empty($this->query['groupid'])) ? $this->model->addMember(intval($this->query['groupid']), $this->query['member']) : NULL;
  $this->view->ajax($data);
 }

 public function action_removeMember(){
  $data = (!empty($this->query['groupid'])) ? $this->model->removeMember(intval($this->query['groupid']), $this->query['member']) : NULL;
  $this->view->ajax($data);
 }
}
