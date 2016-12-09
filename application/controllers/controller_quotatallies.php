<?php

class Controller_Quotatallies extends Controller{
 protected $query;

 public function __construct(){
  parent::__construct();
  $this->model = new Model_Quotatallies();
  $this->query = $_REQUEST;
 }

 public function action_index(){
  $data = $this->model->get_data();
  $this->view->generate('quotatallies_view.php', 'template_view.php', $data);
 }

 public function action_delete(){
  $data = $this->model->delete_quotatally($this->query['quotatallyid']);
  $this->view->ajax($data);
 }
}
