<?php

/**
* Controller for Admin Class
**/

class Controller_Admins extends Controller {
 protected $query;
 
 public function __construct() {
  parent::__construct();
  $this->model = new Model_Admins();
  $this->query = $_REQUEST;
 }

 public function action_index() {
  $data = $this->model->get_data();
  $this->view->generate('admins_view.php', 'template_view.php', $data);
 }

 public function action_edit() {
  $data = $this->model->get($this->query['adminid']);
  $this->view->generate('admin_edit.php', 'template_view.php', $data);
 }

 public function action_changeStatus() {
  $data = $this->model->changeStatus($this->query['adminid']);
  $this->view->ajax($data);
 }

 public function action_create() {
  $data = $this->model->create($this->query['admin']);
  $this->view->ajax($data);
 }

 public function action_delete() {
  $admin = $this->model->get($this->query['adminid']);
  $data = $this->model->delete($admin->adminid);
  $this->view->ajax($data);
 }

 public function action_update() {
  $data = $this->model->update($this->query['admin']);
  $this->view->ajax($data);
 }
}
