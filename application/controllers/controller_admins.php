<?php

/**
* Controller for Admin Class
**/

class Controller_Admins extends Controller {

 public function __construct() {
  $this->model = new Model_Admins();
  $this->view = new View();
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
  $this->view->generate('', 'ajax_view.php', $data);
 }

 public function action_create() {
  $data = $this->model->create($this->query['admin']);
  $this->view->generate('', 'ajax_view.php', $data);
 }

 public function action_delete() {
  $admin = $this->model->get($this->query['adminid']);
  $data = $this->model->delete($admin->adminid);
  $this->view->generate('', 'ajax_view.php', $data);
 }

 public function action_update() {
  $data = $this->model->update($this->query['admin']);
  $this->view->generate('', 'ajax_view.php', $data);
 }
}
