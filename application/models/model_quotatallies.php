<?php

class Model_Quotatallies extends Model{

 public function get_data(){
  return QuotaTally::find_all();
 }

 public function delete_group($quotatallyid){
  return QuotaTally::find_by_id($quotatallyid)->delete();
 }
}
