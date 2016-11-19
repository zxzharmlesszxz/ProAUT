<?php

class Controller_Quotatallies extends Controller{

 public function __construct(){
  $this->model = new Model_Quotatallies();
  $this->view = new View();
  $this->query = $_REQUEST;
 }

 public function action_index(){
  $data = $this->model->get_data();
  $this->view->generate('quotatallies_view.php', 'template_view.php', $data);
 }

 public function action_delete(){
  $data = $this->model->delete_quotatally($this->query['quotatallyid']);
  $this->view->generate('quotatally_delete.php', 'ajax_view.php', $data);
 }
}
