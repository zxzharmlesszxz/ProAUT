<?php

class Model_Quotalimits extends Model{

 public function get_data(){
  return QuotaLimit::find_all();
 }

 public function get_quotalimit($quotalimitid){
  return QuotaLimit::find_by_id($quotalimitid);
 }

 public function save_quotalimit(QuotaLimit $quotalimit){
  $quotalimit->save();
  return $quotalimit;
 }

 public function delete_quotalimit($quotalimitid){
  return QuotaLimit::find_by_id($quotalimitid)->delete();
 }

 public function create_quotalimit(array $quotalimit){
  $new = QuotaLimit::add(
		$quotalimit['name'], $quotalimit['quota_type'],
		$quotalimit['per_session'], $quotalimit['limit_type'],
		$quotalimit['bytes_in_avail'], $quotalimit['bytes_out_avail'],
		$quotalimit['bytes_xfer_avail'], $quotalimit['files_in_avail'],
		$quotalimit['files_out_avail'], $quotalimit['files_xfer_avail']
	);
  $new->save();
  return $new;
 }
}
