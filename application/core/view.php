<?php

/**
* View Class
**/

class View {
	public function generate($content_view, $template_view, $data = null) {
		include 'application/views/'.$template_view;
	}

 public function ajax($data) {
  header('Content-Type: application/json');
  echo json_encode($data);
 }
}
